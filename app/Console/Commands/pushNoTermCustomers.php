<?php

namespace App\Console\Commands;

use App\Customer;
use Illuminate\Console\Command;

class pushNoTermCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'odoo:pushNoTerm';

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
/*        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo->connect();
        $customers = $odoo
            ->where('user_id', '!=', false)
            ->where('x_studio_field_mu5dT', '!=', '')
            ->where('property_payment_term_id', '=', false)
        //    ->limit(10)
            ->fields(
                'id',
                'user_id',
                'is_company',
                'display_name',
                'name',
                'property_payment_term_id',
                'x_studio_field_mu5dT'
            )
            ->get('res.partner');*/

                $odoo = new \Edujugon\Laradoo\Odoo();
                $odoo->connect();

                $customers = $odoo->where('user_id', '!=', false)
                      ->where('x_studio_field_mu5dT', '!=', '')
                      ->where('property_payment_term_id', '=', false)
                //      ->limit(10)
                      ->update('res.partner',

                          [
                              'property_payment_term_id' => 1]);

            //    dd($customers);
                /*                ->update('res.partner', [
                                    'is_company' => 1,
                                    'name' => $c->name,
                                    'x_studio_field_api_id' => $c->api_id,
                                    'x_studio_field_mu5dT' => $c->license,
                                    'x_studio_field_0tSf6' => $c->expiration,
                                    'x_studio_reference_id' => $c->reference_id,
                                    'x_studio_field_Bo5Dv' => $c->business_name,
                                    'street' => $c->street,
                                    'street2' => $c->street2,
                                    'city' => $c->city,
                                    'zip' => $c->zip,
                                    'user_id' => $c->user_id,
                                    'x_studio_territory' => $c->territory,
                                    'email' => $c->email,
                                    'phone' => $c->phone,
                                    'x_studio_license_type' => $c->license_type,
                                    'website' => $c->website
                                ]);*/


        return 0;
    }
}
