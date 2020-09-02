<?php

namespace App\Notifications;

use App\Agedthreshold;
use App\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Validation\Rules\In;

class InvoiceDue extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Invoice $invoice, Agedthreshold $threshold)
    {
        $this->invoice = $invoice;
        $this->threshold = $threshold;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // dd($this->threshold);
        /*        return (new MailMessage)->view(
                    'emails.name', ['invoice' => $this->invoice]
                );*/
        return (new MailMessage)
            ->subject('Uncollected Invoice ' . $this->invoice->sales_oder . ' is over ' . $this->threshold->age . "days old!")
            ->line('Please contact ' . $this->invoice->customer_name . ' as soon as possible!')
            ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
