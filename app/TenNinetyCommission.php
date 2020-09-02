<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    /**
 * App\TenNinetyCommission
 *
 * @property int $id
 * @property int|null $month
 * @property int|null $year
 * @property int|null $rep_id
 * @property int $is_ten_ninety
 * @property float|null $goal
 * @property float|null $volume
 * @property float|null $volume_collected
 * @property float|null $percent
 * @property float|null $commission
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission whereGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission whereIsTenNinety($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission whereRepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission whereVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission whereVolumeCollected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TenNinetyCommission whereYear($value)
 * @mixin \Eloquent
 */
class TenNinetyCommission extends Model
    {
        protected $table = "ten_ninety_commissions";
        protected $fillable = ['month', 'year','half', 'rep_id','rep','goal', 'volume','volume_collected','percent','is_ten_ninety','commission'];
    }
