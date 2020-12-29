<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
/**
 * App\AgedReceivablesTotal
 *
 * @property int $id
 * @property int|null $rep_id
 * @property int|null $customer_id
 * @property int $is_felon
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
 * @property float|null $customer_total
 * @property float|null $to_collect
 * @property float|null $collected
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereCollected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereCustomerTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereIsFelon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereRange0($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereRange1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereRange2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereRange3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereRange4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereRange5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereRange6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereRange7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereRange8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereRep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereRepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereResidual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereToCollect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AgedReceivablesTotal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgedReceivablesTotal extends Model
{
/*    use Searchable;
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
		'customer_total',
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
