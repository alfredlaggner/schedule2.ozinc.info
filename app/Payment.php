<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Payment
 *
 * @property int $id
 * @property int|null $ext_id
 * @property string|null $name
 * @property string|null $display_name
 * @property string|null $move_name
 * @property string|null $payment_date
 * @property string|null $payment_type
 * @property string|null $state
 * @property float|null $amount
 * @property float|null $payment_difference
 * @property int|null $multi
 * @property int|null $has_invoices
 * @property int|null $invoice_ids
 * @property int|null $customer_id
 * @property string|null $customer_name
 * @property string|null $customer_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereCustomerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereHasInvoices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereInvoiceIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereMoveName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereMulti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment wherePaymentDifference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
//    protected $table = 'payments_work';
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
