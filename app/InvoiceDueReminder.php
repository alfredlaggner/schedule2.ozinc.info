<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDueReminder extends Model
{
    protected $fillable = ['invoice_id',
        'sent_date', 'days_due', 'message_id','comments'
    ];

    public function invoice(){
        return($this->belongsTo(App\Invoice::class));
    }
    public function message(){
        return($this->hasOne(App\InvoiceDueMessage::class));
    }
}
