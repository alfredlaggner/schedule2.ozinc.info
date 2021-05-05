<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Invoice;

class send_inactive_reps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:inactive_users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'flags inactive users in customers and invoices';

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
      //$this->send_to_customers($odoo);
    }

    public function send_to_customers($odoo)
    {
        $query = \DB::table('customers')
            ->where('is_not_active_rep', true)
            ->get();

        foreach ($query as $q) {

            $updated = $odoo->where('id', '=', $q->ext_id)
                ->update('res.partner', [
                    'x_studio_rep_inactive' => $q->is_not_active_rep
                ]);
            $this->info($q->name);
            sleep(1);

        }
    }

    public function send_to_invoices($odoo)
    {

        $query = Invoice::where('is_not_active_rep', true)
            ->orderBy('invoice_date','desc')
            ->get();

        foreach ($query as $q) {

            $updated = $odoo->where('id', '=', $q->ext_id)
                ->update('account.invoice', [
                    'x_studio_rep_inactive' => $q->is_not_active_rep
                ]);
            $this->info($q->name . ' - ' . $q->invoice_date);
            sleep(.5);
        }

    }
}
