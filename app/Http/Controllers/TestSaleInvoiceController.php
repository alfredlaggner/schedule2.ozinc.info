<?php

namespace App\Http\Controllers;

use App\SalesOrder;
use Illuminate\Http\Request;
use App\SaleInvoiceTest;
use App\SaleInvoice;
use App\InvoiceLine;
use Illuminate\Support\Facades\DB;

class TestSaleInvoiceController extends Controller
{
    public function index()
    {
        $sls = SaleInvoice::select(DB::raw('
                customers.ext_id as id,
                customers.name as customer_name,
                count(invoice_number) as so_count,
                sum(amt_invoiced + amt_to_invoice) as sum_amt_invoiced
                '))
       //     ->where('invoice_status', '=', 'invoiced')
            ->join('customers', 'customers.ext_id', '=', 'saleinvoices.customer_id')
            ->whereRaw('MONTH(saleinvoices.invoice_date) = 12')
            ->where(function ($query) {
                $query->where('saleinvoices.invoice_status', '=', 'invoiced')
                    ->orWhere('saleinvoices.invoice_status', '=', 'to invoice');
            })
            ->orderBy('customers.name')
            ->groupBy('customer_id')
            ->get();
        $total_invoiced =0;
        $total_so =0;
        foreach ($sls as $sl){
            print $sl->id . ">" .$sl->customer_name . " ". $sl->sum_amt_invoiced . " ". $sl->so_count . "<br>";
            $total_invoiced += $sl->sum_amt_invoiced;
            $total_so += $sl->so_count;
        }
        echo $total_so;
        dd ($total_invoiced);
        return $sl;
    }

    public function salesorders()
    {
        $so = SalesOrder::select(DB::raw('
              count(sales_order) as sales_order_count,
              sum(amount_untaxed) as sum_amt_untaxed
                '))
            ->where('invoice_status', '=', 'to invoice')
            ->get()->toArray();
        return $so;
    }
    public function invoicelines()
    {
        $sls = InvoiceLine::select(DB::raw('
                customers.ext_id as id,
                customers.name as customer_name,
                sum(price_total) as sum_amt_invoiced
                '))
            //     ->where('invoice_status', '=', 'invoiced')
            ->join('customers', 'customers.ext_id', '=', 'invoice_lines.customer_id')
            ->whereRaw('MONTH(invoice_lines.create_date) = 2')
            ->orderBy('customers.name')
            ->groupBy('customer_id')
            ->get();
        $total_invoiced =0;
        foreach ($sls as $sl){
            print $sl->id . ">" .$sl->customer_name . " ". $sl->sum_amt_invoiced . " ". $sl->so_count . "<br>";
            $total_invoiced += $sl->sum_amt_invoiced / 1.24;
        }
        dd ($total_invoiced);
        return $sl;
    }

}
