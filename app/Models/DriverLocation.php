<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DriverLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'driver_id',
        'lat',
        'lng'
    ];

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
