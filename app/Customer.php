<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    //use Searchable;
    use Notifiable;

    protected $fillable = [
        'ext_id_contact',
        'ext_id',
        'api_id',
        'license','license_expiration',
        'license2','license_expiration2',
        'street',
        'name',
        'street2',
        'city',
        'zip',
        'website',
        'phone',
        'email',
        'user_id',
        'sale_order_count',
        'total_due',
        'total_overdue',
        'sales_person',
        'longitude',
        'latitude',
        'reference_id',
        'license_type',
        'bcc_business_name',
        'territory',
    ];

    public function saleinvoices()
    {
        return $this->hasMany('App\SaleInvoice', 'ext_id_shipping', 'ext_id');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice', 'customer_id', 'ext_id');
    }

    public function sales_orders()
    {
        return $this->hasMany('App\SalesOrder', 'customer_id', 'ext_id');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return array(
            'id' => $array['id'],
            'name' => $array['name'],
            'street' => $array['street'],
        );
    }
}
