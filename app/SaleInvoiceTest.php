<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\SaleInvoiceTest
 *
 * @property-read \App\Customer $customer
 * @property-read \App\Margin $product
 * @property-read \App\SalesPerson $salesperson
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoiceTest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoiceTest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SaleInvoiceTest query()
 * @mixin \Eloquent
 */
class SaleInvoiceTest extends Model
{
    //  use Searchable;

    protected $table = 'saleinvoices_test';
    protected $fillable = [
        'amt_to_invoice',
        'amt_invoiced',
        'invoice_status',
        'odoo_margin',
        'qty_invoiced',
        'qty_to_invoice',
        'qty_delivered',
        'invoice_number',
        'product_id',
        'customer_id',
        'ext_id',
        'order_date',
        'driver_log_id',
        'order_id',
        'ext_id_shipping',
        'name',
        'brand',
        'brand_id',
        'quantity',
        'ext_id_unit',
        'unit_price',
        'sales_person_id',
        'code', 'cost',
        'margin',
        'quantity_corrected',
        'updated_at',
        'created_at'];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'ext_id_shipping', 'ext_id');
    }

    public function product()
    {
        return $this->hasOne('App\Margin', 'ext_id', 'product_id');
    }
    public function salesperson()
    {
        return $this->hasOne('App\SalesPerson', 'sales_person_id', 'sales_person_id');
    }


}
