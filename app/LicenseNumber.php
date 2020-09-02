<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\LicenseNumber
 *
 * @property int $id
 * @property int|null $odoo_id
 * @property int|null $api_id
 * @property string|null $bcc_license
 * @property string|null $license_exp
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LicenseNumber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LicenseNumber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LicenseNumber query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LicenseNumber whereApiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LicenseNumber whereBccLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LicenseNumber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LicenseNumber whereLicenseExp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LicenseNumber whereOdooId($value)
 * @mixin \Eloquent
 */
class LicenseNumber extends Model
{
    //
}
