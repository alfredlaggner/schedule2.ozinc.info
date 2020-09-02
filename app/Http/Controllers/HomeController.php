<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\InvoiceMonthlyTotal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

	public function invoice()
	{
		$invoices = Invoice::selectRaw('invoice_number,sum(amount_untaxed_signed) as total_unsigned, sum(amount_untaxed) as total,customer_name')
			-> whereRaw ("(state = 'paid' or state = 'open') AND month(invoice_date) = 1 and sales_person_id = 14")
			->orderBy('customer_id')
			->groupBy('customer_id')
			->groupBy('invoice_number')
			->get();
		$total_sum = 0;
		$total_unsigned_sum = 0;
		foreach ($invoices as $invoice){
			$total_sum += $invoice->total;
			$total_unsigned_sum += $invoice->total_unsigned;
			InvoiceMonthlyTotal:: updateOrCreate(
				[
					'customer_name' => $invoice->customer_name,
				],
				[
					'order_name' =>$invoice->invoice_number,
					'sales_person_name' => $invoice->sales_person_name,
					'total' =>$invoice->total,
					'total_unsigned' =>$invoice->total_unsigned
				]
			);
		}
		echo $total_sum . "<br>";
		echo $total_unsigned_sum;
		dd($invoices->toArray());

		return view('home');
	}
	public function products()
	{
		$invoices = InvoiceLine::selectRaw('sum(amount_untaxed_signed) as total_unsigned, sum(amount_untaxed) as total,customer_name')
			-> whereRaw ("(state = 'paid' or state = 'open') AND month(invoice_date) = 1 and sales_person_id = 14")
			->orderBy('customer_id')
			->groupBy('customer_id')
			->get();
		$total_sum = 0;
		$total_unsigned_sum = 0;
		foreach ($invoices as $invoice){
			$total_sum += $invoice->total;
			$total_unsigned_sum += $invoice->total_unsigned;
			InvoiceMonthlyTotal:: updateOrCreate(
				[
					'customer_name' => $invoice->customer_name,
				],
				[
					'sales_person_name' => $invoice->sales_person_name,
					'total' =>$invoice->total,
					'total_unsigned' =>$invoice->total_unsigned
				]
			);
		}
		echo $total_sum . "<br>";
		echo $total_unsigned_sum;
		dd($invoices->toArray());

		return view('home');
	}
}
