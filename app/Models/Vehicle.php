<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VehicleWorkingHours;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'reg_no',
        'name',
        'image',
        'fixed_charges',
        'over_time_charges',
        'over_range_charges_type',
        'over_range_charges',
        'status'
    ];


    public function workingHours()
    {
        return $this->hasOne(VehicleWorkingHours::class);
    }

    protected $casts = [
        'status' => 'boolean',
      ];

}
