<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\ShipmentItems;
use App\Models\Address;
use App\Models\ShipmentCharge;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tracking_no',
        'customer_id',
        'vehicle_id',
        'driver_id',
        'pickup_address',
        'drop_address',
        'distance',
        'payment_method',
        'payment_status',
        'total_amount',
        'cancelled_reason',
        'cancelled_by',
        'shipment_date_time'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function shipment_charges()
    {
        return $this->hasOne(ShipmentCharge::class);
    }
    public function shipment_items()
    {
        return $this->hasMany(ShipmentItems::class);
    }
    public function pickup_location()
    {
        return $this->belongsTo(Address::class, 'pickup_address', 'id');
    }
    public function drop_location()
    {
        return $this->belongsTo(Address::class,'drop_address','id');
    }
}
