<?php

namespace App\Console\Commands;

use App\MetrcItem;
use App\Product;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class metrc_get_manifests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'metrc:manifests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Periodically reads all metrc active items.';

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
     * @return mixed
     */
    public function handle()
    {
        $client = new Client([
            'base_uri' => "https://api-ca.metrc.com",
            'timeout' => 2.0,
        ]);
        $headers = [
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
            'auth' => ['4w9TaWS-WuFYilK5r91lmKC2LwuGHr0q0nkvYM3axVo1z1Fo', 'IgLHZR3M-5DjNPsXinfVZJ7PWQfm31CxGD8aFC8dZMbzJP5i'],
        ];

        $license = 'C11-0000224-LIC';

        $yesterday = date("Y-m-d",strtotime("- 1 day"));
        $today = date('Y-m-d');
   //     dd($yesterday);
        $response_string = '&lastModifiedStart=' . '2006-02-05T06:30:00Z&lastModifiedEnd=' .  '2008-03-05T07:30:59Z';

        $response = $client->request('GET', '/transfers/v1/incoming?licenseNumber=' . $license . '&lastModifiedStart=' . $yesterday . 'T06:30:00Z&lastModifiedEnd=' . $today . 'T06:29:59Z', $headers);
        $items = json_decode($response->getBody()->getContents());
      $this->info(count($items)) ;
        dd(($items));


        /*        $response = $client->request('GET', '/unitsofmeasure/v1/active?licenseNumber=' . $license, $headers);
                $items = json_decode($response->getBody()->getContents());*/


        MetrcItem::truncate();
        for ($i = 0; $i < count($items); $i++) {
            //   $this->info($items[$i]->Name);

            MetrcItem:: updateOrCreate(
                [
                    'metrc_id' => $items[$i]->Id,
                    'name' => $items[$i]->Name,
                    'category_name' => $items[$i]->ProductCategoryName,
                    'category_type' => $items[$i]->ProductCategoryType,
                    'quantity_type' => $items[$i]->QuantityType,
                    'unit_quantity'  => $items[$i]->UnitQuantity,
                    'quantity_uom' => $items[$i]->UnitQuantityUnitOfMeasureName,
                    'volume_uom' => $items[$i]->UnitVolumeUnitOfMeasureName,
                    'unit_weight' => $items[$i]->UnitWeight,
                    'unit_volume' => $items[$i]->UnitVolume,
                    'is_used' => $items[$i]->IsUsed,
                ]);
        }
        $this->info(date_format(date_create(), 'Y-m-d H:i:s'));

    }
}
