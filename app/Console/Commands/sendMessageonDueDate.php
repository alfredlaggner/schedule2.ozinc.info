<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail;
use App\Invoice;

class sendMessageonDueDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:due_message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends email one day after invoice due';

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
        $today = date("Y/m/d");
        $invoices = Invoice::where('type', 'out_invoice')
            ->where('state', 'open')
            ->where('due_date', '<,=>', $today)
            ->get();
        foreach ($invoices as $invoice) {
            echo $invoice->sales_order . " ---" . "invoice->due_date";
        }
        \Mail::to('alfred.laggner@gmail.com')->send(new \App\Mail\SendDueMessage($details));

        return 0;
    }
}
