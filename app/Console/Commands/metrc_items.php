<?php

namespace App\Console\Commands;

use App\MetrcItem;
use App\Product;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class metrc_items extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'metrc:items';

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
        $new_package = '1A4060300003C35000019794';

/*        $response = $client->request('GET', '/items/v1/active?licenseNumber=' . $license, $headers);
        $items = json_decode($response->getBody()->getContents());
        //    dd(($items));
*/

        $response = $client->request('GET', '/unitsofmeasure/v1/active?licenseNumber=' . $license, $headers);
        $items = json_decode($response->getBody()->getContents());


            dd(($items));


        for ($i = 0; $i < count($items); $i++) {
            //     $this->info($packages[$i]->ProductName);

            MetrcItem:: updateOrCreate(
                ['metrc_id' => $items[$i]->Id],
                [
                    'name' => $items[$i]->Name,
                ]);
        }
    }
}
