<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	/**
 * App\Brand
 *
 * @property int $id
 * @property int|null $ext_id
 * @property string|null $name
 * @property string|null $category
 * @property string|null $subcategory
 * @property string|null $category_full
 * @property int $is_active
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereCategoryFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereSubcategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Brand extends Model
	{
		protected $fillable = [
			'ext_id',
			'name',
			'category_full',
			'category',
			'subcategory',
			'created_at',
			'updated_at'
		];
	}
