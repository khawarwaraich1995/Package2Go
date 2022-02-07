<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shipment;

class BroadcastedShipments extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'driver_id',
        'distance'
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
