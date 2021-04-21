<?php

namespace App\Console\Commands;

use App\Customer;
use App\Invoice;
use Illuminate\Console\Command;

class sendCollectionUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:collection_user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Replace inactive user with Odoo Collection user';

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

        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $this->send_to_invoices($odoo);
    //    $this->send_to_customers($odoo);

        return 0;
    }

    public function send_to_customers($odoo)
    {


        $query = Customer::where('is_not_active_rep', true)
            ->where('user_id', env('OZ_COLLECTION'))
            ->get();

        foreach ($query as $q) {

            $updated = $odoo->where('id', '=', $q->ext_id)
                ->update('res.partner', [
                    'user_id' => env('OZ_COLLECTION'),
                    'x_studio_rep_inactive' => $q->sales_person_id_org
                ]);
            $this->info($q->name . ' - ' . $q->ext_id);
            sleep(1);
        }


        return 0;
    }

    public function send_to_invoices($odoo)
    {


        $query = Invoice::where('is_not_active_rep', true)
            ->where('sales_person_id', env('OZ_COLLECTION'))
            ->limit(1)
            ->get();

        foreach ($query as $q) {

            $updated = $odoo->where('id', '=', $q->ext_id)
                ->update('account.invoice', [
                    'user_id' => env('OZ_COLLECTION'),
                    'x_studio_rep_inactive' => $q->sales_person_id_org
                ]);
            $this->info($q->name . ' - ' . $q->ext_id);
            sleep(1);
        }


        return 0;
    }

}
