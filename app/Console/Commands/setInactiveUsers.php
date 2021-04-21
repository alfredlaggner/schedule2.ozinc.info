<?php

namespace App\Console\Commands;

use App\SalesPerson;
use App\Invoice;
use App\Customer;
use App\User;
use Illuminate\Console\Command;

class setInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:inactive_users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Marks invoices with inactive reps';

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
        Invoice::whereHas('inactive_user')->update([
            'is_not_active_rep' => true
        ]);
        Invoice::where('is_not_active_rep',true)->update([
            'sales_person_id' => env('ODOO_COLLECTION',118) ]);

        User::whereHas('inactive_user')->update([
            'is_not_active' => true
        ]);

        Salesperson::whereHas('inactive_user')->update([
            'is_not_active' => true
        ]);

        Customer::whereHas('inactive_user')->update([
            'is_not_active_rep' => true
        ]);

        Customer::where('is_not_active_rep',true)->update([
            'user_id' => env('ODOO_COLLECTION',118) ]);

        return 0;
    }
}
