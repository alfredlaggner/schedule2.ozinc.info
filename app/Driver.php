<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Driver
 *
 * @property int $id
 * @property int|null $sales_person_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $license
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone_number
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver whereLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver whereSalesPersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Driver whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Driver extends Model
{
    protected $fillable = ['sales_person_id',
        'name', 'email', 'password','first_name','last_name', 'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
