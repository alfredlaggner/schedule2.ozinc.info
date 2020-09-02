<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\SalesPerDay
 *
 * @property int $id
 * @property string|null $invoice_number
 * @property int|null $order_id
 * @property string|null $order_date
 * @property string|null $name
 * @property string|null $sku
 * @property int|null $quantity
 * @property float|null $cost
 * @property float|null $unit_price
 * @property float|null $margin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $sales_person_id
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $code
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereInvoiceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereSalesPersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerDay whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SalesPerDay extends Model
{
	use Searchable;
	protected $fillable = ['order_id','order_date','name','quantity','cost', 'margin', 'sku','sales_person_id', 'code'];
}
