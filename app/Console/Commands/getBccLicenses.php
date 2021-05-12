<?php

namespace App\Console\Commands;

use App\BccAllLicense;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class getBccLicenses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bcc:licenses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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



        $response = Http::withHeaders([
            'Accept' => '*/*',
            'app_id' => "979eb638",
            'app_key' => "265c8147d9e89f74907506b60d2906b5"
        ])->get('https://iservices.dca.ca.gov/api/bcclicenseread/getAllBccLicenses');
        //   dd($response->successful());
        $results = collect(json_decode($response->getBody()));
        //   dd($results);
        $code = $response->getStatusCode(); // 200
        $reason = $response->getReasonPhrase(); // OK
        foreach ($results as $result) {
            $short_zip = substr($result->premiseZip, 0, 5);
        //    $this->info($short_zip);
            BccAllLicense::updateOrCreate(
                    [
                        "licenseNumber" => $result->licenseNumber
                    ],
                    [
                        "licenseType" => $result->licenseType,
                        "issuedDate" => $result->issuedDate,
                        "addressLine1" => $result->addressLine1,
                        "addressLine2" => $result->addressLine2,
                        "premiseCity" => $result->premiseCity,
                        "premiseState" => $result->premiseState,
                        "premiseZip" => $short_zip,
                        "premiseCounty" => $result->premiseCounty,
                        "licenseStatus" => $result->licenseStatus,
                        "businessStructure" => $result->businessStructure,
                        "medicinal" => $result->medicinal == 'NO' ? false : true,
                        "adultUse" => $result->adultUse == 'NO' ? false : true,
                        "microActivityRetailerNonStorefront" => $result->microActivityRetailerNonStorefront,
                        "microActivityRetailer" => $result->microActivityRetailer,
                        "microActivityDistributor" => $result->microActivityDistributor,
                        "microActivityDistributorTransportOnly" => $result->microActivityDistributorTransportOnly,
                        "microActivityLevel1Manufacturer" => $result->microActivityLevel1Manufacturer,
                        "microActivityCultivator" => $result->microActivityCultivator,
                        "expiryDate" => $result->expiryDate,
                        "businessName" => $result->businessName,
                        "businessDBA" => $result->businessDBA,
                        "businessOwner" => $result->businessOwner,
                        "website" => $result->website,
                        "phone" => $result->phone,
                        "email" => $result->email,
                    ]);


        }
        $queries = BccAllLicense::select('*',
            'bcc_zip_to_regions.territory as bcc_zip_to_regions_territory',
            'bcc_all_licenses.licenseNumber as bcc_all_licenses_licenseNumber',

        )
            ->leftJoin('customers', 'customers.license', 'like', 'bcc_all_licenses.licenseNumber')
            ->leftJoin('bcc_zip_to_regions', 'bcc_zip_to_regions.zip', '=', "bcc_all_licenses.premiseZip")
            ->update([
                'bcc_all_licenses.territory' => \DB::raw("bcc_zip_to_regions.territory"),
                'bcc_all_licenses.ozCustomer'  =>  \DB::raw(' CASE WHEN customers.license IS NULL THEN 0 ELSE 1 END')
            ]);

   //     dd("xxx");

          $this->info(date_format(date_create(), 'Y-m-d H:i:s'));
        return 0;
    }
}
