<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * App\AgedReceivables
 *
 * @property int $id
 * @property int|null $salesorder_id
 * @property int|null $rep_id
 * @property int|null $customer_id
 * @property string|null $sales_order
 * @property string|null $customer
 * @property string|null $rep
 * @property float|null $range0
 * @property float|null $range1
 * @property float|null $range2
 * @property float|null $range3
 * @property float|null $range4
 * @property float|null $range5
 * @property float|null $range6
 * @property float|null $range7
 * @property float|null $range8
 * @property float|null $residual
 * @property float|null $to_collect
 * @property float|null $collected
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereCollected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereRange0($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereRange1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereRange2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereRange3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereRange4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereRange5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereRange6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereRange7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereRange8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereRep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereRepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereResidual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereSalesOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereSalesorderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereToCollect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivables whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgedReceivables extends Model
{
   /* use Searchable;
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
    */
    protected $fillable = [
        'salesorder_id',
        'rep_id',
        'customer_id',
        'sales_order',
        'customer',
        'residual',
        'rep',
        'range0',
        'range1',
        'range2',
        'range3',
        'range4',
        'range5',
        'range6',
        'range7',
        'range8',
    ];
}
