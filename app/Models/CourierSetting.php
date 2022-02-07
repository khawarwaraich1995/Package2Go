<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'charges_type',
        'charges_type_2',
        'charges_type_3',
        'one_day_delivery_charges',
        'two_days_delivery_charges',
        'three_days_delivery_charges',
    ];
}
