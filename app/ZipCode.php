<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ZipCode
 *
 * @property int $id
 * @property int|null $zip
 * @property string|null $city
 * @property string $state
 * @property float|null $lat
 * @property float|null $longitude
 * @property string|null $location
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ZipCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ZipCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ZipCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ZipCode whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ZipCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ZipCode whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ZipCode whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ZipCode whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ZipCode whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ZipCode whereZip($value)
 * @mixin \Eloquent
 */
class ZipCode extends Model
{
    //
}
