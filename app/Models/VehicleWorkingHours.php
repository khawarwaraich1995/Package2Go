<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleWorkingHours extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'vehicle_id',
        'sunday',
        'sunday_open',
        'sunday_close',
        'monday',
        'monday_open',
        'monday_close',
        'tuesday',
        'tuesday_open',
        'tuesday_close',
        'wednesday',
        'wednesday_open',
        'wednesday_close',
        'thursday',
        'thursday_open',
        'thursday_close',
        'friday',
        'friday_open',
        'friday_close',
        'saturday',
        'saturday_open',
        'saturday_close'

    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];


    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'id', 'vehicle_id');
    }
}
