<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StockMove;
use App\SaleInvoice;
use App\SalesOrder;
use App\Customer;
use \App\Margin;
use \App\Brand;
use \App\SalesPerDay;
use \App\SalesPerson;
use \Carbon\Carbon;
use App\Traits\CommissionTrait;
use App\Commission;

class OdooController extends Controller
{
    use CommissionTrait;

    public function getBrands()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();
        $categories = $odoo
            ->fields(
                'id',
                'code',
                'name',
                'display_name',
                'parent_id',
                'parent_left',
                'parent_right'
            )
            ->get('product.category');

        //	\DB::table('brands')->delete();
        for ($i = 0; $i < count($categories); $i++) {
            $categ_temp = explode('/', $categories[$i]['display_name']);
            $brand = '';
            if (sizeof($categ_temp) > 2) {
                $len = 2;
            } elseif (sizeof($categ_temp) > 3) {
                $len = 3;
            } else {
                $len = sizeof($categ_temp) - 1 > 0 ? sizeof($categ_temp) - 1 : 0;
            }

            if ($len)
                $brand = $categ_temp[$len];


            echo "<br><br>" . $categories[$i]['display_name'] . "<br> len= " . $len . "brand= " . $brand . "<br>";
            var_dump($categ_temp);
            Brand:: updateOrCreate(
                [
                    'ext_id' => $categories[$i]['id']
                ],
                [
                    'name' => $brand,
                    'category_full' => $categories[$i]['display_name'],
                ]
            );
        }
        dd("xx");
    }


    public function getMargins($from = '2018-10-01', $to = '2018-10-10')
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $products = $odoo
            ->fields(
                'id',
                'code',
                'display_name',
                'product_id',
                'list_price',
                'standard_price'
            )
            ->get('product.product');


        for ($i = 0; $i < count($products); $i++) {

            $cost = $products[$i]['standard_price'];
            $revenue = $products[$i]['list_price'];
            $gross_profit = $revenue - $cost;
            if ($gross_profit > 0 and $revenue > 0 and $cost > 0) {
                $margin = 100 * ($revenue - $cost) / $revenue;
            } else {
                $margin = 0;
            };

            Margin:: updateOrCreate(
                [
                    'ext_id' => $products[$i]['id']
                ],
                [
                    'name' => $products[$i]['display_name'],
                    'cost' => $cost,
                    'revenue' => $revenue,
                    'margin' => $margin
                ]
            );
        }
        dd("done");
    }

    public function runMargins(Request $request)
    {

        \App\Jobs\getProductsFromOdoo::dispatch();
    }

    public function getSalesOrders($from = '2018-10-01', $to = '2018-10-10')
    {

        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $orders = $odoo
            ->where('date_order', '>=', $from)
            ->where('date_order', '<=', $to)
            ->fields(
                'id',
                'display_name',
                'date_order',
                'partner_id',
                'user_id',
                'margin',
                'order_partner_id',
                'amount_total',
                'amount_tax',
                'amount_untaxed'
            )
            ->get('sale.order');

        for ($i = 0; $i < count($orders); $i++) {
            $order_date = ($orders[$i]['date_order'] == true) ? date_format(date_create($orders[$i]['date_order']), "Y-m-d") : NULL;
            SalesOrder:: updateOrCreate(
                [
                    'sales_order' => $orders[$i]['display_name']
                ],
                [
                    'order_date' => $order_date,
                    'salesperson_id' => $orders[$i]['user_id'][0],
                    'sales_order_id' => substr($orders[$i]['display_name'], 2),
                    'customer_id' => $orders[$i]['partner_id'][0],
                    'amount_total' => $orders[$i]['amount_total'][0],
                    'amount_tax' => $orders[$i]['amount_tax'][0],
                    'amount_untaxed' => $orders[$i]['amount_untaxed'][0],
                ]
            );
        }
        dd("done");
    }


    public function getStock($from = '2018-10-01', $to = '2018-10-01')
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();
        $stock_moves = $odoo
            ->where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->fields(
                'id',
                'date',
                'reference',
                'product_id',
                'location_id',
                'location_dest_id',
                'qty_done',
                'lot_name',
                'state',
                'location_processed'
            )
            ->get('stock.move.line');
//dd(count($stock_moves));
        for ($i = 0; $i < count($stock_moves); $i++) {

            StockMove::updateOrCreate(
                [
                    'ext_id' => $stock_moves[$i]['id']
                ],
                [
                    'sku' => substr($stock_moves[$i]['product_id'][1], 0, 9),
                    'product_id' => $stock_moves[$i]['product_id'][0],
                    'name' => substr($stock_moves[$i]['product_id'][1], 9),
                    'date' => $stock_moves[$i]['date'],
                    'reference' => $stock_moves[$i]['reference'],
                    'location' => $stock_moves[$i]['location_id'][1],
                    'location_dest' => $stock_moves[$i]['location_dest_id'][1],
                    'qty_done' => $stock_moves[$i]['qty_done'],
                    'state' => $stock_moves[$i]['state']
                ]
            );
        }
        $date1 = StockMove::orderby('id', 'asc')->first()->date;
        $date2 = StockMove::orderby('id', 'desc')->first()->date;

        $datetime1 = new \DateTime(date($date1));
        $datetime2 = new \DateTime(date($date2));
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%r%a');

        session(['stockMoveDays' => $days]);

        dd("done");
    }

    public function calcProductsPerDay()
    {
        $products = SaleInvoice::
        select('*', \DB::raw('SUM(quantity) AS sumqty'))
            ->groupBy('order_date')->groupBy('name')
            ->get();

        \DB::table('sales_per_days')->delete();

        foreach ($products as $p) {
            $sp = new SalesPerDay;
            $sp->order_id = $p->order_id;
            $sp->order_date = $p->order_date;
            $sp->name = substr($p->name, 9);
            $sp->sku = substr($p->name, 0, 9);
            $sp->quantity = $p->sumqty;
            $sp->cost = $p->cost;
            $sp->margin = $p->margin;
            $sp->unit_price = $p->unit_price;
            $sp->sales_person_id = $p->sales_person_id;
            $sp->code = $p->code;
            $sp->created_at = $p->order_date;
            $sp->save();
        }

        dd('done');
    }

    public function getOrderLines($from = '2018-04-01', $to = '2020-12-31')
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();
        $from = date('Y-m-d', strtotime("-1 days"));
        $order_lines = [];
        $order_lines = $odoo
            ->where('create_date', '>=', $from)
            ->fields(
                'id',
                'name',
                'price_subtotal',
                'product_uom_qty',
                'price_unit',
                'product_uom',
                'create_date',
                'order_partner_id',
                'product_id',
                'list_price',
                'order_id',
                'purchase_price',
                'salesman_id'
            )
            ->get('sale.order.line');

        for ($i = 0; $i < count($order_lines); $i++) {
            $revenue = $order_lines[$i]['price_unit'];
            $cost = $order_lines[$i]['purchase_price'];
            $gross_profit = $revenue - $cost;
            $name_org = $order_lines[$i]['name'];
            $pos = strpos($name_org, ']');
            $name = substr($name_org, $pos + 2);
            $code = substr($name_org, 0, $pos + 2);
            if ($gross_profit > 0 and $revenue > 0 and $cost > 0) {
                $margin = 100 * ($gross_profit) / $revenue;
            } else {
                $margin = 0;
            };
            SaleInvoice::updateOrCreate(
                [
                    'ext_id' => $order_lines[$i]['id']
                ],
                [
                    'ext_id_shipping' => $order_lines[$i]['order_partner_id'][0],
                    'order_date' => $order_lines[$i]['create_date'],
                    'created_at' => $order_lines[$i]['create_date'],
                    'sales_person_id' => $order_lines[$i]['salesman_id'][0],
                    'order_id' => $order_lines[$i]['order_id'][0],
                    'invoice_number' => $order_lines[$i]['order_id'][1],
                    'name' => $name,
                    'code' => $code,
                    'quantity' => $order_lines[$i]['product_uom_qty'],
                    'cost' => $order_lines[$i]['purchase_price'],
                    'ext_id_unit' => $order_lines[$i]['product_uom'][1],
                    'unit_price' => $order_lines[$i]['price_unit'],
                    'margin' => $margin
                ]);
        }
        dd("done ...");
    }

    public
    function getCustomers()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $customers = $odoo
            ->where('customer', '=', true)
            ->where('is_company', '=', true)
            ->fields(
                'id',
                'customer',
                'is_company',
                'display_name',
                'name',
                'street',
                'street2',
                'city',
                'zip',
                'phone',
                'user_id',
                'x_studio_field_mu5dT',
                'x_studio_field_DN9mZ'
            )
            ->get('res.partner');

        for ($i = 0; $i < count($customers); $i++) {


            if (!$customers[$i]['street2']) {
                $street2 = NULL;
            } else {
                $street2 = $customers[$i]['street2'];
            }

            Customer::updateOrCreate(
                [
                    'ext_id' => $customers[$i]['id']
                ],
                [
                    'ext_id' => $customers[$i]['id'],
                    'ext_id_contact' => $customers[$i]['id'],
                    'name' => preg_replace("/[^a-zA-Z0-9\s]/", " ", $customers[$i]['display_name']),
                    'street' => $customers[$i]['street'],
                    'street2' => $street2,
                    'city' => $customers[$i]['city'],
                    'zip' => $customers[$i]['zip'],
                    'phone' => $customers[$i]['phone'],
                    'license' => substr($customers[$i]['x_studio_field_mu5dT'], 0, 20),
                    'license2' => substr($customers[$i]['x_studio_field_DN9mZ'], 0, 20),
                ]);
        }
        dd("done");
    }

    public function getUsers()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $users = $odoo
            ->fields(
                'id',
                'name',
                'email',
                'date_order'
            )
            ->get('res.users');

        for ($i = 0; $i < count($users); $i++) {
            SalesPerson::updateOrCreate([
                'sales_person_id' => $users[$i]['id'],
                'name' => $users[$i]['name'],
                'email' => $users[$i]['email'],
            ]);
        }
    }

    public
    function getTotalQuantity()
    {

        $total = Margin::with(['stock_moves' => function ($query) {
            $query->sum('qty_done');
        }])->get();
        return $total;
    }

}
