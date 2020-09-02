<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BccRetailer;

class CaliforniaZipcode extends Model
{
   protected $fillable = ['sales_person_id'];

    public function bbc_retailers(){
        return $this->hasOne('BccRetailer', 'zip','zip');
    }

}
