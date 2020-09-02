<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
/**
 * App\SaleInvoice
 *
 * @property int $id
 * @property int|null $ext_id
 * @property string|null $uid
 * @property string|null $invoice_number
 * @property int|null $order_id
 * @property int|null $customer_id
 * @property int|null $product_id
 * @property string|null $name
 * @property int|null $brand_id
 * @property string|null $brand
 * @property string|null $category
 * @property string|null $subcategory
 * @property string|null $order_date
 * @property string|null $invoice_date
 * @property string|null $write_date
 * @property string|null $code
 * @property float|null $amt_to_invoice
 * @property float|null $amt_invoiced
 * @property float|null $price_subtotal
 * @property string|null $invoice_status
 * @property int $is_paid
 * @property float|null $product_margin
 * @property float|null $promotion_percent
 * @property int|null $qty_to_invoice
 * @property int|null $qty_invoiced
 * @property int|null $qty_delivered
 * @property int|null $quantity
 * @property float|null $cost
 * @property float|null $unit_price
 * @property float|null $margin
 * @property float|null $comm_percent
 * @property float|null $commission
 * @property int $comm_version
 * @property string|null $comm_region
 * @property int|null $sales_person_id
 * @property float|null $odoo_margin
 * @property int|null $quantity_corrected
 * @property string|null $ext_id_unit
 * @property string|null $ext_id_shipping
 * @property string|null $note
 * @property string|null $line_note_id
 * @property int $is_updated
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Customer|null $customer
 * @property-read \App\Invoice $invoice
 * @property-read \App\Margin|null $product
 * @property-read \App\SalesPerson $salesperson
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereAmtInvoiced($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereAmtToInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereCommPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereCommRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereCommVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereExtIdShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereExtIdUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereInvoiceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereInvoiceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereInvoiceStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereIsPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereIsUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereLineNoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereOdooMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice wherePriceSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereProductMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice wherePromotionPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereQtyDelivered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereQtyInvoiced($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereQtyToInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereQuantityCorrected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereSalesPersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereSubcategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoice whereWriteDate($value)
 * @mixin \Eloquent
 */
class SaleInvoice extends Model
{
    //  use Searchable;

    protected $table = 'saleinvoices';
    protected $fillable = [
        'amt_to_invoice',
        'amt_invoiced',
        'price_subtotal',
        'invoice_status',
        'is_paid',
        'odoo_margin',
        'qty_invoiced',
        'qty_to_invoice',
        'qty_delivered',
        'invoice_number',
        'product_id',
        'customer_id',
        'ext_id',
        'order_date',
        'invoice_date',
        'driver_log_id',
        'order_id',
        'ext_id_shipping',
        'name',
		'brand',
		'category',
		'subcategory',
		'category',
		'subcategory',
		'brand_id',
        'quantity',
        'ext_id_unit',
        'unit_price',
        'sales_person_id',
        'code', 'cost',
        'margin',
        'commission',
        'comm_region',
        'comm_percent',
        'quantity_corrected',
        'updated_at',
        'created_at'];

/*    protected static function boot()
    {
		        parent::boot();
			   static::addGlobalScope('age', function (Builder $builder) {
	 *            $builder->where('saleinvoices.sales_person_id', '>', 0)
					   ->where('saleinvoices.margin', '>', -100)
					   ->where('saleinvoices.margin', '<', 100)
					   ->whereYear('saleinvoices.invoice_date', '=', 2019)
					   ->where(function ($query) {
						   $query->where('saleinvoices.invoice_status', '=', 'invoiced')
							   ->orWhere('saleinvoices.invoice_status', '=', 'to invoice');
					   });
        });

    }*/

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'ext_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Margin', 'product_id', 'ext_id');
    }

    public function salesperson()
    {
        return $this->hasOne('App\SalesPerson', 'sales_person_id', 'sales_person_id');
    }

    public function invoice()
    {
        return $this->hasOne('App\Invoice', 'sales_order', 'invoice_number');
    }


}
