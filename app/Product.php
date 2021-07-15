<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property int $id
 * @property int|null $ext_id
 * @property string|null $code
 * @property string|null $name
 * @property int|null $brand_id
 * @property string|null $brand
 * @property int|null $category_id
 * @property string|null $category
 * @property string|null $sub_category
 * @property string|null $category_full
 * @property int|null $is_active
 * @property int|null $quantity
 * @property float|null $cost
 * @property float|null $revenue
 * @property float|null $margin
 * @property float|null $commission_percent
 * @property int|null $units_sold
 * @property int|null $sale_ok
 * @property int $purchase_ok
 * @property int|null $units_forcasted
 * @property int|null $incoming_qty
 * @property int|null $available_threshold
 * @property float|null $list_price
 * @property float|null $weight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAvailableThreshold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategoryFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCommissionPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereIncomingQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereListPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePurchaseOk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereRevenue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSaleOk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSubCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUnitsForcasted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUnitsSold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereWeight($value)
 * @mixin \Eloquent
 */
class Product extends Model
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
        'is_sellable',
        'unit_size',
    ];
}
