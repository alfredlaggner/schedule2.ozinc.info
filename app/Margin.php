<?php

	namespace App;

	use Laravel\Scout\Searchable;
	use Illuminate\Database\Eloquent\Model;

	class Margin extends Model
	{
	//	use Searchable;

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
            'list_price',
            'image'
        ];

		public function stock_moves()
		{
			return $this->hasMany('App\StockMove', 'product_id', 'ext_id');
		}

		public function saleinvoice()
		{
			return $this->hasMany('App\Margin', 'product_id', 'ext_id');
		}
	}
