<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\InvoiceLine
 *
 * @property int $id
 * @property int|null $invoice_id
 * @property string|null $order_number
 * @property string|null $invoice_number
 * @property string|null $invoice_name
 * @property int|null $order_id
 * @property int|null $brand_id
 * @property string|null $brand
 * @property string|null $category
 * @property string|null $subcategory
 * @property int|null $customer_id
 * @property int|null $product_id
 * @property int|null $sales_person_id
 * @property int|null $ext_id
 * @property string|null $invoice_date compatibility only
 * @property string|null $invoice_state
 * @property string|null $order_date
 * @property string|null $create_date
 * @property string|null $code
 * @property string|null $name
 * @property int|null $quantity
 * @property float|null $qty_invoiced
 * @property float|null $unit_price
 * @property float|null $price_total
 * @property float|null $amt_invoiced
 * @property float|null $price_subtotal
 * @property string|null $ext_id_unit
 * @property float|null $cost
 * @property float|null $margin
 * @property float|null $product_margin
 * @property int $comm_version
 * @property string|null $comm_region
 * @property float|null $comm_percent
 * @property float|null $commission
 * @property float|null $promotion_percent
 * @property float|null $amt_to_invoice compatibility only
 * @property int|null $qty_to_invoice
 * @property int|null $qty_delivered
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Customer $customer
 * @property-read \App\SaleInvoice $order_line
 * @property-read \App\Margin $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereAmtInvoiced($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereAmtToInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereCommPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereCommRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereCommVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereCreateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereExtIdUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereInvoiceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereInvoiceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereInvoiceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereInvoiceState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine wherePriceSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine wherePriceTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereProductMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine wherePromotionPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereQtyDelivered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereQtyInvoiced($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereQtyToInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereSalesPersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereSubcategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceLine whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InvoiceLine extends Model
{
	protected $fillable = [
        'ext_id',
        'amt_to_invoice',
		'amt_invoiced',
		'price_subtotal',
		'price_total',
        'invoice_state',
        'invoice_date',
        'invoice_id',
        'invoice_name',
        'invoice_number',
        'invoice_paid_at',
        'commission_paid_at',
        'odoo_margin',
		'qty_invoiced',
		'qty_to_invoice',
		'qty_delivered',
		'order_number',
		'product_id',
		'customer_id',
		'order_date',
		'create_date',
		'driver_log_id',
		'order_id',
		'ext_id_shipping',
		'name',
		'brand',
		'brand_id',
		'quantity',
		'ext_id_unit',
		'unit_price',
		'sales_person_id',
		'code', 'cost',
		'margin',
		'quantity_corrected',
		'updated_at',
		'created_at'];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'ext_id_shipping', 'ext_id');
    }
    public function InactiveUser()
    {
        return $this->hasOne(UserInactive::class, 'sales_person_id', 'sales_person_id');
    }

    public function product()
    {
        return $this->hasOne('App\Margin', 'ext_id', 'product_id');
    }

    public function order_line()
    {
        return $this->hasOne('App\SaleInvoice', 'order_id', 'order_id')
			->where('product_id', $this->product_id);
    }
}
