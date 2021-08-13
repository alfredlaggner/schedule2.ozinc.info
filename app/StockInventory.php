<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockInventory extends Model
{
    protected $fillable = [
        'ext_id',
        'product_name',
        'product_id',
        'state',
        'total_qty',
        'inventory_date',
        'line_ids'
        ];

}
