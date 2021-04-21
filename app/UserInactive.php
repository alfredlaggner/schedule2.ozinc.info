<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInactive extends Model
{

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'sales_person_id', 'sales_person_id');
    }

}
