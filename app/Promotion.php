<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function margins(){
    	return($this->BelongsToMany(App\Margin::class));
	}
}
