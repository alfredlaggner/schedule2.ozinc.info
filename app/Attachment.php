<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //
    protected $fillable = ['ext_id',
        'name',
        'active',
        'display_name',
        'product_id',
        'image_small',
        'image'
    ];
}
