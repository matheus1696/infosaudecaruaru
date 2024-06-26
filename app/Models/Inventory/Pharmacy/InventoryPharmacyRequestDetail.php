<?php

namespace App\Models\Inventory\Pharmacy;

use App\Models\Medication\Medication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryPharmacyRequestDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'quantity_default',
        'quantity_current',
        'quantity_forwarded',
        'confirmed',
        'medication_id',
        'store_room_request_id',
    ];

    public function Medication(){
        return $this->belongsTo(Medication::class,'medication_id','id')->orderBy('title');
    }

    public function InventoryPharmacyRequest(){
        return $this->belongsTo(InventoryPharmacyRequest::class,'store_room_request_id','id')->orderBy('title');
    }
}
