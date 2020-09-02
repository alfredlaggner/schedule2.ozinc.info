<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Package
 *
 * @property int $id
 * @property int|null $ext_id
 * @property string|null $tag
 * @property string|null $item
 * @property string|null $category
 * @property string|null $item_strain
 * @property int|null $quantity
 * @property string|null $lab_testing
 * @property string|null $date
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereItemStrain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereLabTesting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Package whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Package extends Model
{
    protected $table = 'metrc_packages';

    protected $fillable = [
        'ext_id',
        'tag',
        'product_id',
        'ref',
        'item',
        'category',
        'item_strain',
        'quantity',
        'uom',
        'lab_testing',
        'date'
        ];
}
