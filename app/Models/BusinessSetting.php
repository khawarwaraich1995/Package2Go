<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'address',
        'emergency_phone',
        'ride_cancellation_charges',
        'ride_cancellation_time',
        'distance_unit',
        'driver_acceptance_time',
        'admin_comission',
        'date_time_format',
        'time_format',
        'timezone',
        'currency',
        'footer_text',
        'fb_link',
        'insta_link',
        'about_us',
        'privacy_policy',
        'terms_and_conditions',
    ];
}
