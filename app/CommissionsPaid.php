<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CommissionsPaid
 *
 * @property int $id
 * @property int|null $ext_id
 * @property int|null $saved_commissions_id
 * @property int $is_paid
 * @property string|null $paid_at
 * @property string|null $paid_by
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommissionsPaid newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommissionsPaid newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommissionsPaid query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommissionsPaid whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommissionsPaid whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommissionsPaid whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommissionsPaid whereIsPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommissionsPaid wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommissionsPaid wherePaidBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommissionsPaid whereSavedCommissionsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommissionsPaid whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CommissionsPaid extends Model
{
    protected $fillable = ['ext_id','invoice_state','order_number','invoice_paid_at','is_paid','paid_at','paid_by'];
}
