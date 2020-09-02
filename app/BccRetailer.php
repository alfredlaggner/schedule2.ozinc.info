<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BccRetailer
 *
 * @property int $id
 * @property int $is_odoo
 * @property int|null $sales_person_id
 * @property string|null $sales_person_name
 * @property string|null $license
 * @property string|null $designation
 * @property string|null $business_name
 * @property string|null $dba
 * @property string|null $status
 * @property string|null $expiration_date
 * @property string|null $business_structure
 * @property string|null $city
 * @property int|null $zip
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\CaliforniaZipcode|null $ca_city
 * @property-read \App\CaliforniaZipcode|null $ca_zip_code
 * @property-read \App\SalesPerson $sales_person
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereBusinessName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereBusinessStructure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereDba($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereIsOdoo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereSalesPersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereSalesPersonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BccRetailer whereZip($value)
 * @mixin \Eloquent
 */
class BccRetailer extends Model
{
	protected $fillable = ['is_odoo','zip','sales_person_id'];

    public function ca_zip_code(){
        return $this->belongsTo('App\CaliforniaZipcode', 'zip','zip');
    }
    public function ca_city(){
        return $this->belongsTo('App\CaliforniaZipcode', 'city','city');
    }
    public function sales_person(){
        return $this->hasOne('App\SalesPerson', 'sales_person_id','sales_person_id');
    }
}
