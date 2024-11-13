<?php

namespace App\Models\Fleet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetModels extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer_id',
        'model',
        'engine',
        'transmission',
        'fuel_type',
    ];

    public function FleetManufacturer(){
        return $this->belongsTo(FleetManufacturer::class,'manufacturer_id','id');
    }
}
