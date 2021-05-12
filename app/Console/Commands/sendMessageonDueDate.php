<?php

namespace App\Console\Commands;

use App\InvoiceDueReminder;
use App\InvoiceDueMessage;
use Illuminate\Console\Command;
use App\Mail;
use App\Invoice;
use Carbon\Carbon;

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
      //  $today = date("Y/m/d");
        $today = Carbon::now();
     //   $today = Carbon::now()->addDays(5);
        $recent = Date('y:m:d', strtotime('-30 days'));
        $invoices = Invoice::where('type', 'out_invoice')
            ->where('state', 'open')
            ->whereBetween('due_date', [$recent, $today])
            ->get();

        //   InvoiceDueReminder::truncate();
        $message_id = 0;
        foreach ($invoices as $invoice) {

            $now = Carbon::now();
            $now = Carbon::now();

            $days_due = $now->diffInDays($invoice->due_date);

            $is_send_email = !($days_due % env('REMINDER_INTERVAL'));

            if ($is_send_email) {
                if ($days_due) {
                    $message_number = $days_due / env('REMINDER_INTERVAL');
                } else {
                    $message_number = 0;
                }
                $this->info("Message Number:" . $message_number);
                $message_id = InvoiceDueMessage::where('reminder', $message_number)->value('id');
                $message_text = InvoiceDueMessage::where('reminder', $message_number)->value('text');
                $this->info("Message Id: " . $message_text);

                InvoiceDueReminder::updateOrcreate(
                    ['invoice_id' => $invoice->id],
                    [
                        'sent_date' => date("Y-m-d h:i:s"),
                        'message_id' => $message_id,
                        'comments' => $message_text,
                        'days_due' => $days_due,

                    ]
                );

            }
            else {
                InvoiceDueReminder::updateOrcreate(
                ['invoice_id' => $invoice->id],
                [
                    'sent_date' => Carbon::parse('0000-00-00 0:0:0')->format('Y-m-d'),
                    'days_due' => $days_due,
                    'comments' => '',
                ]
            );}
        }

        return 0;
    }
}
