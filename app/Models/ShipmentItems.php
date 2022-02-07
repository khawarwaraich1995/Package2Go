<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'shipment_id',
        'height',
        'width',
        'length',
        'weight'
    ];
}
