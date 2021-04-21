<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use \App\Customer;
class simDeptorUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sim:update_deptor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Debitor Information';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $customers = Customer::where('total_overdue', '>', 0)->whereNotNull('internal_debtor_id')->limit(1)->get();
    //    dd($customers);
        $api_token = 'e3367925-707e-11eb-b109-128234efe66d';

        foreach ($customers as $customer) {
          //  dd($customer);
            $data = [
                "ApiToken" => $api_token,
                "DebtorId" => $customer->internal_debtor_id,
                "DebtorCompanyName" => $customer->name,
                "DebtorAddress" => $customer->street,
                "DebtorCity" => $customer->city,
                "DebtorState" => $customer->state,
                "DebtorZip" => $customer->zip,
                "DebtorHomePhone" => $customer->phone,
          //      "DebtorEmail" => $customer->email,
/*                "DebtorCustomFields" => [
                    [
                        "FieldName" => "sale_order_count",
                        "FieldValue" => $customer->sale_order_count,
                        "TableColumnName" => "Sale_Order_Count",
                        "DataType" => "double(10,2)"
                    ],
                    [
                        "FieldName" => "currentBalanceDue",
                        "FieldValue" => $customer->total_overdue,
                        "TableColumnName" => "Total_Invoiced",
                        "DataType" => "double(10,2)"
                    ],
                    [
                        "FieldName" => "license",
                        "FieldValue" => $customer->license,
                        "TableColumnName" => "License",
                        "DataType" => "varchar(255)"
                    ]
                ]*/
            ];

        }
//dd($data);
        $api_token = 'e3367925-707e-11eb-b109-128234efe66d';
        $client = new Client();
        $url = "http://app.simplicitycollect.com/api/debtors/update";

        $response = $client->post($url . '?format=json', ["json" => $data]);
        $result = json_decode($response->getBody());
        //    dd($result);
        $code = $response->getStatusCode(); // 200
        $reason = $response->getReasonPhrase(); // OK
        echo $code;
        echo $reason;
        dd($result);
        $this->info(date_format(date_create(), 'Y-m-d H:i:s'));

        return 0;
    }
}
