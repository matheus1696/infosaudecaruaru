<?php

namespace App\Models\Inventory\Pharmacy;

use App\Models\Medication\Medication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryPharmacyStandardRequestList extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'quantity',
        'medication_id',
        'standard_request_id',
    ];    

    public function Medication(){
        return $this->belongsTo(Medication::class,'medication_id','id');
    }
}
