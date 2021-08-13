<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockInventoryLine extends Model
{
    protected $fillable = [
        'ext_id',
        'product_name',
        'product_id',
        'inventory_id',
        'state',
        'product_qty',
        'theoretical_qty',
        'create_date'
    ];
}
