<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BccAllLicense extends Model
{
    protected $fillable = [
        "licenseNumber",
        "licenseType",
        "issuedDate",
        "addressLine1",
        "addressLine2",
        "premiseCity",
        "premiseState",
        "premiseZip",
        "premiseCounty",
        "licenseStatus",
        "businessStructure",
        "medicinal",
        "adultUse",
        "microActivityRetailerNonStorefront",
        "microActivityRetailer",
        "microActivityDistributor",
        "microActivityDistributorTransportOnly",
        "microActivityLevel1Manufacturer",
        "microActivityCultivator",
        "expiryDate",
        "businessName",
        "businessDBA",
        "businessOwner",
        "website",
        "phone",
        "email",
        "territory",
        "ozCustomer",
        'customer_id'
    ];
    protected $dates = [
        'updated_at',
        'created_at',
        'expiryDate',
        'issuedDate'
    ];

    public function isOzCustomer()
    {
        return (hasOne(Customer::class, 'licenceNumber', 'licence'));
    }
}
