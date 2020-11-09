<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetrcItem extends Model
{
    protected $fillable = [
        'metrc_id',
        'name',
        'category_name',
        'category_type',
        'quantity_type',
        'unit_quantity',
        'quantity_uom',
        'volume_uom',
        'unit_weight',
        'unit_volume',
        'is_used',
    ];
}
