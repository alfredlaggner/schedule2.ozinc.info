<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	/**
 * App\Salesline
 *
 * @property int $id
 * @property string|null $order_number
 * @property string|null $order_date
 * @property string|null $customer_name
 * @property int|null $customer_id
 * @property int|null $sales_person_id
 * @property string|null $rep
 * @property string|null $sku
 * @property string|null $brand_name
 * @property string|null $name
 * @property string|null $product_category
 * @property string|null $product_subcategory
 * @property int|null $qty_delivered
 * @property float|null $amount_to_invoice
 * @property float|null $amount_invoiced
 * @property int|null $quantity
 * @property float|null $qty_invoiced
 * @property float|null $unit_price
 * @property float|null $cost
 * @property float|null $commission
 * @property float|null $comm_percent
 * @property float|null $amount_tax
 * @property float|null $amount_total
 * @property float|null $amount_untaxed
 * @property string|null $comm_region
 * @property int|null $ext_id
 * @property int|null $order_id
 * @property string|null $invoice_date
 * @property string|null $state
 * @property string|null $invoice_paid_at
 * @property string|null $commission_paid_at
 * @property int|null $product_id
 * @property int|null $brand_id
 * @property float|null $margin
 * @property float|null $amount
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereAmountInvoiced($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereAmountTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereAmountToInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereAmountTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereAmountUntaxed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereBrandName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereCommPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereCommRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereCommissionPaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereInvoiceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereInvoicePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereProductCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereProductSubcategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereQtyDelivered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereQtyInvoiced($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereRep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereSalesPersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salesline whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Salesline extends Model
	{
		// protected $table = 'saleslines';

		protected $fillable = [
			'order_number',
			'order_date',
			'customer_name',
			'customer_id',
			'rep',
			'state',
            'invoice_paid_at',
            'activity_state',
            'commission_paid_at',
			'name',
			'product_category',
			'product_subcategory',
			'sku',
			'brand_name',
			'qty_delivered',
			'qty_invoiced',
			'quantity',
			'amount_invoiced',
			'amount_to_invoice',
			'unit_price',
			'cost',
			'commission',
			'comm_percent',
			'amount_tax',
			'amount_total',
			'amount_untaxed',
			'invoice_date',
			'ext_id',
			'comm_region',
			'order_id',
			'product_id',
            'brand_id',
            'category',
            'subcategory',
            'brand',
			'margin',
			'amount',
            'sales_person_id',
			'is_updated'
		];
	}
