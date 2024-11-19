<?php

namespace App\Models\Fleet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetOdometer extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'hour',
        'odometer',
        'value_unit',
        'value_total',
        'category_service',
        'category_description',
        'current_odometer',
        'establishment',
        'driver',
        'description',
        'vehicle_id',
    ];
}
