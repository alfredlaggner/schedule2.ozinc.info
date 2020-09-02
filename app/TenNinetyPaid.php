<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenNinetyPaid extends Model
{
    protected $table = 'ten_ninety_paids';
    protected $fillable = ['ext_id','invoice_state','order_number','invoice_paid_at','is_paid','paid_at','paid_by'];
}
