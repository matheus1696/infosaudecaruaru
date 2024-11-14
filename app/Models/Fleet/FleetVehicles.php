<?php

namespace App\Models\Fleet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetVehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'license_plate',
        'color',
        'year_manufacture',
        'year_models',
        'owner_status',
        'inicial_odometer',
        'current_odometer',
        'establishment_id',
        'financial_block_id',
        'status',
    ];

    public function FleetModel(){
        return $this->belongsTo(FleetModels::class,'model_id','id');
    }
}
