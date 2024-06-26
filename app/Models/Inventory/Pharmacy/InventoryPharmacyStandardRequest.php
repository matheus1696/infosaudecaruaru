<?php

namespace App\Models\Inventory\Pharmacy;

use App\Models\Medication\MedicationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryPharmacyStandardRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'medication_type_id',
        'status',
    ];

    public function MedicationType(){
        return $this->belongsTo(MedicationType::class,'medication_type_id','id');
    }
}
