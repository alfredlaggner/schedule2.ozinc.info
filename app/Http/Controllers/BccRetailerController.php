<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BccRetailer;
use App\CustomerWithBcc;

class BccRetailerController extends Controller
{
    public function get_bccRetailer()
    {
        $bccRetailers = BccRetailer::all();
        $customers = CustomerWithBcc::all();
        foreach ($customers as $customer) {
            $bccRetailers = BccRetailer::
            where('business_name', 'like', '%' . $customer->name . '%')->
            orWhere('dba', 'like', '%' . $customer->name . '%')->limit(1)->get();
            foreach ($bccRetailers as $bccRetailer) {
                if ($bccRetailer->count()) {
                    echo $bccRetailer->business_name . "found<br>";
					$customer->update([
						'name' => ucwords(strtolower($bccRetailer->business_name)),
						'license' => $bccRetailer->license,
						'is_bcc' => true,
						'dba' => $bccRetailer->dba,
					]);
					$bccRetailer->update([
						'is_odoo' => 1,
						'zip' => $customer->zip,
					]);
				}
                else{
                    echo $bccRetailer->business_name . "not found<br>";
                }
            }
        }
       dd("the end");
    }
    public function assignZipcodes()
    {
        CaliforniaZipcode::where('county', '=', 'Del Norte')
            ->orWhere('county', '=', 'Siskiyou')
            ->orWhere('county', '=', 'Modoc')
            ->orWhere('county', '=', 'Humboldt')
            ->orWhere('county', '=', 'Trinity')
            ->orWhere('county', '=', 'Shasta')
            ->orWhere('county', '=', 'Lassen')
            ->orWhere('county', '=', 'Mendocino')
            ->orWhere('county', '=', 'Tehama')
            ->orWhere('county', '=', 'Plumas')
            ->orWhere('county', '=', 'Lake')
            ->orWhere('county', '=', 'Glenn')
            ->orWhere('county', '=', 'Butte')
            ->orWhere('county', '=', 'Sonoma')
            ->orWhere('county', '=', 'Napa')
            ->orWhere('county', '=', 'Yolo')
            ->orWhere('county', '=', 'Sutter')
            ->orWhere('county', '=', 'Yuba')
            ->orWhere('county', '=', 'Nevada')
            ->orWhere('county', '=', 'Sierra')
            ->orWhere('county', '=', 'Solano')
            ->orWhere('county', '=', 'Sacramento')
            ->orWhere('county', '=', 'El Dorado')
            ->orWhere('county', '=', 'Amador')
            ->orWhere('county', '=', 'Alpine')
            ->update(['sales_person_id' => 38]); //Bill Sutterfield

        CaliforniaZipcode::where('county', '=', 'Contra Costa')
            ->orWhere('county', '=', 'San Joaquin')
            ->orWhere('county', '=', 'Calaveras')
            ->orWhere('county', '=', 'Alameda')
            ->orWhere('county', '=', 'Stanislaus')
            ->orWhere('county', '=', 'Tuolumne')
            ->orWhere('county', '=', 'Lassen')
            ->orWhere('county', '=', 'Mono')
            ->orWhere('county', '=', 'Merced')
            ->orWhere('county', '=', 'Mariposa')
            ->orWhere('county', '=', 'Lake')
            ->orWhere('county', '=', 'Colusa')
            ->orWhere('county', '=', 'Madera')
            ->orWhere('county', '=', 'Fresno')
            ->orWhere('county', '=', 'Kings')
            ->orWhere('county', '=', 'Napa')
            ->orWhere('county', '=', 'Tulare')
            ->orWhere('county', '=', 'Sutter')
            ->orWhere('county', '=', 'Inyo')
            ->orWhere('county', '=', 'Kern')
            ->orWhere('county', '=', 'Placer')
            ->update(['sales_person_id' => 14]); // Uriel

        CaliforniaZipcode::where('county', '=', 'Marin')
            ->orWhere('county', '=', 'City and County of San Francisco')
            ->orWhere('county', '=', 'San Mateo')
            ->update(['sales_person_id' => 26]); // Eddie Sarano

        CaliforniaZipcode::where('county', '=', 'Santa Cruz')
            ->orWhere('county', '=', 'Santa Clara')
            ->orWhere('county', '=', 'Monterey')
            ->orWhere('county', '=', 'San Benito')
            ->update(['sales_person_id' => 11]); //Karl

        CaliforniaZipcode::where('county', '=', 'San Luis Obispo')
            ->orWhere('county', '=', 'Santa Barbara')
            ->orWhere('county', '=', 'Ventura')
            ->update(['sales_person_id' => 9]); // Wade

        CaliforniaZipcode::where('county', '=', 'Los Angeles')
            ->update(['sales_person_id' => 9]); // John Hodges

        CaliforniaZipcode::where('county', '=', 'San Bernardino')
            ->orWhere('county', '=', 'Riverside')
            ->orWhere('county', '=', 'Orange')
            ->update(['sales_person_id' => 35]); // Matt Gutierrez

        CaliforniaZipcode::where('county', '=', 'San Diego')
            ->orWhere('county', '=', 'Imperial')
            ->update(['sales_person_id' => 9]); // Tanner

        dd('done');
    }

    public function assignSalesPerson_to_bbc_retail()
    {
        $bbc_retailers = BccRetailer::whereHas('ca_zip_code')->get();
        //  dd($bbc_retailers->count());
        foreach ($bbc_retailers as $bbc_retailer) {
            $bbc_retailer->sales_person_id = $bbc_retailer->ca_zip_code->sales_person_id;
            $bbc_retailer->save();
            //       echo $bbc_retailer->ca_zip_code->sales_person_id . "<br>";
        }
        $bbc_retailers = BccRetailer::whereHas('ca_city')->get();
        foreach ($bbc_retailers as $bbc_retailer) {
            $bbc_retailer->sales_person_id = $bbc_retailer->ca_city->sales_person_id;
            $bbc_retailer->sales_person_name = $bbc_retailer->sales_person->name;
            $bbc_retailer->save();
            echo $bbc_retailer->ca_city->sales_person_id . "-" . $bbc_retailer->ca_city->sales_person_name . "<br>";
        }
        dd($bbc_retailers->count() . ' done');

    }
}
