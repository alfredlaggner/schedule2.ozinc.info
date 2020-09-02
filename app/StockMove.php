<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\StockMove
 *
 * @property int $id
 * @property int|null $ext_id
 * @property string|null $sku
 * @property int|null $picking_id
 * @property int|null $product_id
 * @property string|null $name
 * @property string|null $date
 * @property string|null $lot_name
 * @property string|null $reference
 * @property string|null $location
 * @property string|null $location_dest
 * @property int|null $qty_done
 * @property string|null $state
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Margin|null $margin
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereLocationDest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereLotName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove wherePickingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereQtyDone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\StockMove whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StockMove extends Model
{
	protected $fillable = ['ext_id','lot_name','date','reference','picking_id','product_id','sku','name','lot_name','location','location_dest','qty_done','state'];

	public function margin(){
		return $this->belongsTo(Margin::class, 'ext_id','product_id');
	}}
