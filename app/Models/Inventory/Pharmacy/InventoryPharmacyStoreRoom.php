<?php

namespace App\Models\Inventory\Pharmacy;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Medication\Medication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryPharmacyStoreRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'quantity_minimum',
        'quantity_maximum',
        'medication_id',
        'department_id',
        'establishment_id',
    ];

    public function Medication(){
        return $this->belongsTo(Medication::class,'medication_id','id')->orderBy('title');
    }

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id')->orderBy('title');
    }
    
    public function CompanyEstablishmentDepartment(){
        return $this->belongsTo(CompanyEstablishmentDepartment::class,'department_id','id')->orderBy('department');
    }
}
