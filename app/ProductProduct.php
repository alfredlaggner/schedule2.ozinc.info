<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProduct extends Model
{
    protected $fillable = ['ext_id',
        'name',
        'cost',
        'brand_id',
        'revenue',
        'margin',
        'commission_percent',
        'units_sold',
        'is_active',
        'code',
        'barcode',
        'brand',
        'category_id',
        'category',
        'sub_category',
        'category_full',
        'quantity',
        'sale_ok',
        'purchase_ok',
        'x_studio_number_sold',
        'virtual_available',
        'incoming_qty',
        'available_threshold',
        'outgoing_qty',
        'weight',
        'uom',
        'unit_size',
        'case_qty',
        'is_sellable',
    ];
    //
}
