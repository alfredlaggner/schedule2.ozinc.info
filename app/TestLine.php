<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TestLine
 *
 * @property int $id
 * @property string|null $invoice_number
 * @property int|null $order_id
 * @property int|null $customer_id
 * @property int|null $product_id
 * @property float|null $product_margin
 * @property int|null $ext_id
 * @property string|null $order_date
 * @property string|null $ext_id_shipping
 * @property string|null $code
 * @property string|null $name
 * @property int|null $quantity
 * @property string|null $ext_id_unit
 * @property float|null $cost
 * @property float|null $unit_price
 * @property float|null $margin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $sales_person_id
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $quantity_corrected
 * @property string|null $note
 * @property string $line_note_id
 * @property-read \App\Customer|null $customer
 * @property-read \App\Margin $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereExtIdShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereExtIdUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereInvoiceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereLineNoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereProductMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereQuantityCorrected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereSalesPersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestLine whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TestLine extends Model
{
    protected $fillable = ['invoice_number', 'product_id', 'ext_id', 'order_date', 'driver_log_id', 'order_id', 'ext_id_shipping', 'name', 'quantity', 'ext_id_unit', 'unit_price',
        'sales_person_id', 'code', 'cost', 'margin', 'quantity_corrected', 'updated_at', 'created_at'];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'ext_id_shipping', 'ext_id');
    }

    public function product()
    {
        return $this->hasOne('App\Margin', 'ext_id', 'product_id');
    }
}
