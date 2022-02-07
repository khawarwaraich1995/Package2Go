<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'customer_id',
        'first_name',
        'last_name',
        'company_name',
        'coordinates',
        'street_address',
        'street_address2',
        'city',
        'zip_code'
    ];
}
