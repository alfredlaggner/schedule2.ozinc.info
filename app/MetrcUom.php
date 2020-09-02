<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetrcUom extends Model
{
    protected $fillable = ['QuantityType', 'Name','Abbreviation'];
}
