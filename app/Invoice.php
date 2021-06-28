<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'ext_id',
        'name',
        'type',
        'reconciled',
        'has_outstanding',
        'residual',
        'age',
        'sales_order',
        'origin',
        'invoice_date',
        'create_date',
        'due_date',
        'amount_untaxed',
        'amount_tax',
        'amount_total',
        'amount_due',
        'amount_untaxed_signed',
        'order_date',
        'customer_id',
        'customer_name',
        'sales_person_id',
        'sales_person_name',
		'state',
        'payment_date',
        'payment_amount',
        'payment_invoice_id',
        'payment_term_id',
        'payment_term_name'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'sales_person_id', 'sales_person_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'ext_id');
    }

    public function inactive_user()
    {
        return $this->hasOne(UserInactive::class, 'sales_person_id', 'sales_person_id');
    }

    public function due_reminder()
    {
        return $this->hasMany('App\InvoiceDueReminder');
    }

}
