<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\InvoiceAmtCollect
 *
 * @property int $id
 * @property int|null $customer_id
 * @property int|null $user_id
 * @property int|null $week
 * @property string|null $customer_name
 * @property float|null $amount_to_collect
 * @property float|null $amt_collected
 * @property float|null $saved_residual
 * @property string|null $note_by
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect whereAmountToCollect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect whereAmtCollected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect whereNoteBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect whereSavedResidual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\InvoiceAmtCollect whereWeek($value)
 * @mixin \Eloquent
 */
class InvoiceAmtCollect extends Model
{
	protected $fillable = ['amt_collected','amount_to_collect','saved_residual','user_id','customer_id','customer_name','week' ];
}
