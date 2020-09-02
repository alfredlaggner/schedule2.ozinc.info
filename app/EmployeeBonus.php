<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeBonus extends Model
{
    protected $fillable = [
        'sales_person_name',
        'sales_person_id',
        'month',
        'year',
        'base_bonus',
        'total_bonus'
    ];
}
