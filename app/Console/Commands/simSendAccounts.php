<?php

namespace App\Console\Commands;

use App\MetrcNoProduct;
use App\MetrcTag;
use App\MetrcUpdate;
use App\Package;
use App\Product;
use App\TmpOdooLot;
use Illuminate\Console\Command;
use Carbon\Carbon;
use GuzzleHttp\Client;

class simSendAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sim:send_accounts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new account';

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

        $client = new Client([
            'base_uri' => "http://app.simplicitycollect.com//accounts/add",
            'timeout' => 10.0,
        ]);
        $headers = [
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ];
        //Content-Length: length

        $api_token = 'e3367925-707e-11eb-b109-128234efe66d';

        $data =
            [
                "ApiToken" => $api_token,
                "AccountNumber" => "12345",
                "ClientName" => "First",
                /*               "ClientClaimNumber" => "String",
                                "AccountType" => "String",
                                "Status" => "String",
                                "Note" => "String",
                                "LastUpdatedDate" => "String",
                                "DateOfFirstDelinquency" => "String",
                                "CreditorName" => "String", */
                "DebtorFirstName" => "Alfred",
                "DebtorMiddleName" => "Laggner",
                /*           "DebtorLastName" => "String",
                           "DebtorAddressOne" => "String",
                           "DebtorAddressTwo" => "String",
                           "DebtorCity" => "String",
                           "DebtorState" => "String",
                           "DebtorZip" => "String",
                           "DebtorSsn" => "String",
                           "DebtorDob" => "String",
                           "DebtorPhone" => "String",
                           "DebtorCellPhone" => "String",
                           "DebtorEmail" => "String",
                           "DebtorEmployerName" => "String",
                           "DebtorEmployerPhone" => "String",
                           "DebtorIsCompany" => false,
                           "DebtorCompanyContact" => "String",
                           "DebtorCompanyContactTitle" => "String",
                           "DebtorCompanyName" => "String",
                           "CoDebtorFirstName" => "String",
                           "CoDebtorMiddleName" => "String",
                           "CoDebtorLastName" => "String",
                           "CoDebtorAddressOne" => "String",
                           "CoDebtorAddressTwo" => "String",
                           "CoDebtorCity" => "String",
                           "CoDebtorState" => "String",
                           "CoDebtorZip" => "String",
                           "CoDebtorSsn" => "String",
                           "CoDebtorDob" => "String",
                           "CoDebtorPhone" => "String",
                           "CoDebtorCellPhone" => "String",
                           "CoDebtorEmail" => "String",
                           "CoDebtorEmployerName" => "String",
                           "CoDebtorEmployerPhone" => "String",
                           "CoDebtorIsCompany" => false,
                           "CoDebtorCompanyContact" => "String",
                           "CoDebtorCompanyContactTitle" => "String",
                           "CoDebtorCompanyName" => "String",
                           "OriginalAmount" => 0,
                           "InterestRate" => "String",
                           "InterestStartDate" => "String",
                           "AccountCustomFields" =>
                               [
                                   "FieldName" => "String",
                                   "FieldValue" => "String",
                                   "TableColumnName" => "String",
                                   "DataType" => "String"
                               ]*/
            ];
        $client = new Client();
        $url = "http://app.simplicitycollect.com/api/accounts/add";
        $data = ["ApiToken" => $api_token,
            "ClientName" => "Oz Distribution, Inc.",
            "DebtorCompanyName" => "Oneplanetherbs",
            "DebtorCompanyContact" => "Terra Laggner",
            "DebtorCompanyContactTitle" => "CEO",
            "DebtorIsCompany" => true,
        ];

        $response = $client->post($url . '?format=json', ["json" => $data]);
//dd($response);
        $result = json_decode($response->getBody());
        //    dd($result);
        $code = $response->getStatusCode(); // 200
        $reason = $response->getReasonPhrase(); // OK
        echo $code;
        echo $reason;
        dd($result);
        $this->info(date_format(date_create(), 'Y-m-d H:i:s'));
    }
}
