<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetrcStrain extends Model
{
    protected $fillable = [
        'metrc_id',
        'name',
        'testing_status',
        'thc_level',
        'cbd_level',
        'indica_percentage',
        'sativa_percentage',
        'is_used',
    ];
}
