<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CustomerWithBcc
 *
 * @property int $id
 * @property int|null $ext_id
 * @property string|null $ext_id_contact
 * @property string|null $license
 * @property string|null $license2
 * @property string|null $name
 * @property string|null $dba
 * @property string|null $street
 * @property string|null $street2
 * @property string|null $city
 * @property string|null $zip
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $is_bcc
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereDba($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereExtIdContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereIsBcc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereLicense2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereStreet2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerWithBcc whereZip($value)
 * @mixin \Eloquent
 */
class CustomerWithBcc extends Model
{
   protected $fillable = ['name','license','is_bcc', 'dba'];
}
