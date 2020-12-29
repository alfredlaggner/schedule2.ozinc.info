<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentAr extends Model
{
    protected $fillable = ['ext_id',
        'name',
        'ext_id',
        'year_paid',
        'year_invoiced',
        'month_paid',
        'month_invoiced',
        'comm_percent',
        'commission',
        'comm_amount',
        'name',
        'display_name',
        'move_name',
        'payment_date',
        'invoice_date',
        'invoice_state',
        'payment_type',
        'state',
        'amount',
        'amount_taxed',
        'amount_untaxed',
        'amount_due',
        'payment_difference',
        'payment_amount',
        'tax',
        'multi',
        'has_invoices',
        'invoice_ids',
        'invoice_id',
        'invoice_count',
        'sales_order',
        'customer_type',
        'customer_id',
        'customer_name',
        'sales_person_id',
        'invoice_id',
        'sales_person_id',
        'comm_paid_at',
        'comm_paid_by',
    ];

    public function invoice()
    {
        return $this->hasOne('App\Invoice', 'ext_id', 'invoice_ids');
    }
}
