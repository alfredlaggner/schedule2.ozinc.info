<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\SalesOrder
 *
 * @property int $id
 * @property int|null $ext_id
 * @property string|null $sales_order
 * @property string|null $invoice_status
 * @property string|null $state
 * @property string|null $activity_state
 * @property int|null $sales_order_id
 * @property string|null $create_date
 * @property string|null $confirmation_date
 * @property string|null $order_date
 * @property string|null $write_date
 * @property float|null $amount_total
 * @property float|null $amount_tax
 * @property float|null $amount_untaxed
 * @property string|null $deliver_date
 * @property int|null $salesperson_id
 * @property int|null $customer_id
 * @property int|null $complaint_id
 * @property int|null $notes_id
 * @property int $is_manifest_created
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\InvoiceLine[] $invoice_line
 * @property-read int|null $invoice_line_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SaleInvoice[] $saleinvoice
 * @property-read int|null $saleinvoice_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereActivityState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereAmountTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereAmountTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereAmountUntaxed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereComplaintId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereConfirmationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereCreateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereDeliverDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereInvoiceStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereIsManifestCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereNotesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereSalesOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereSalesOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereSalespersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesOrder whereWriteDate($value)
 * @mixin \Eloquent
 */
class SalesOrder extends Model
{
   // use Searchable;

    protected $table = 'salesorders';
	protected $fillable = ['ext_id','state','activity_state','sales_order','effective_date','expected_date','payment_term_id','confirmation_date','invoice_status','sales_order_id','create_date','order_date_stamped','write_date','amount_untaxed','amount_total','amount_tax','deliver_date','salesperson_id','customer_id'];

    public function saleinvoice()
    {
        return $this->hasMany('App\SaleInvoice', 'order_id', 'sales_order_id');
    }
    public function invoice_line()
    {
        return $this->hasMany('App\InvoiceLine', 'invoice_id', 'ext_id');
    }
    public function stock_picking()
    {
        return $this->hasOne(\App\StockPicking::class, 'salesorder_number',	'sales_order');
    }

}
