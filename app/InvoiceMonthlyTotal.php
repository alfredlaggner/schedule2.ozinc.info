<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\InvoiceMonthlyTotal
 *
 * @property int $id
 * @property string|null $customer_name
 * @property string|null $oder_name
 * @property string|null $sales_person_name
 * @property float|null $total
 * @property float|null $total_unsigned
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceMonthlyTotal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceMonthlyTotal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceMonthlyTotal query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceMonthlyTotal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceMonthlyTotal whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceMonthlyTotal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceMonthlyTotal whereOderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceMonthlyTotal whereSalesPersonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceMonthlyTotal whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceMonthlyTotal whereTotalUnsigned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceMonthlyTotal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InvoiceMonthlyTotal extends Model
{
    protected $fillable = [
        'customer_name',
        'sales_person_name',
		'order_name',
        'total',
        'total_unsigned'
    ];
}
