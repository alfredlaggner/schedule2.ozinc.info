<?php

namespace App\Http\Controllers;

use App\SalesOrder;
use Illuminate\Http\Request;

class TimespanController extends Controller
{
    public function so_time_span()
    {
        $sales_orders = SalesOrder::has('stock_picking')->orderBy('confirmation_date', 'desc')->limit(100)->get();
          dd($sales_orders);
        foreach ($sales_orders as $sales_order) {
            //  dd($sales_order);
            $begin_time = $sales_order->confirmation_date;
         //   $end_time = $sales_order->stock_picking->date_done;
            echo $sales_order->confirmation_date .  "<br>";

            /*            if ($sales_order->stock_picking->date_done) {
                            echo $sales_order->confirmation_date  . "<br>";
                        }
            */
            //    echo  $sales_order->sales_order  . "<br>";
        }
        dd("xxx");
    }
}

