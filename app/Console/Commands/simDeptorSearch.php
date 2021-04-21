<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class simDeptorSearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sim:deptor_search';

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
        $api_token = 'e3367925-707e-11eb-b109-128234efe66d';
        $client = new Client();
        $url = "http://app.simplicitycollect.com/api/debtors/search";
        $data = ["ApiToken" => $api_token,
            "DebtorCompanyName" => "420 Oasis",
        ];
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
