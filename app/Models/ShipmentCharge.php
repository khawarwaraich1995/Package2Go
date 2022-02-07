<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'shipment_id',
        'delivery_charges',
        'vehicle_fixed_charges',
        'vehicle_overtime_charges',
        'vehicle_over_range_charges'
    ];
}
