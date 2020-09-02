<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SavedCommission
 *
 * @property int $id
 * @property string|null $description
 * @property string|null $name
 * @property string|null $date_created
 * @property string|null $comment
 * @property string|null $created_by
 * @property int|null $month
 * @property int|null $year
 * @property int $is_commissions_paid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission whereDateCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission whereIsCommissionsPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SavedCommission whereYear($value)
 * @mixin \Eloquent
 */
class SavedCommission extends Model
{
    //
}
