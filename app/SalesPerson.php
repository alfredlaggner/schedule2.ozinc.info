<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SalesPerson
 *
 * @property int $id
 * @property int|null $sales_person_id
 * @property int $is_salesperson
 * @property int $is_ten_ninety
 * @property string|null $name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $phone_number
 * @property string|null $region
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson whereIsSalesperson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson whereIsTenNinety($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson whereSalesPersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SalesPerson whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SalesPerson extends Model
{
    protected $table = "sales_persons";
    protected $fillable = ['sales_person_id', 'email', 'name', 'phone_number', 'region','is_salesperson','is_ten_ninety'];

    public function inactive_user()
    {
        return $this->hasOne(UserInactive::class, 'sales_person_id', 'sales_person_id');
    }

}
