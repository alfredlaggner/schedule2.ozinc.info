<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenNinetyCommissionSalesOrder extends Model
{
    protected $fillable = ['month', 'year','half', 'rep_id','is_paid','is_comm_paid', 'amount_untaxed','commission','sales_order_id','customer_id','customer_name','sales_order','invoice_date','is_ten_ninety','commission'];
}
