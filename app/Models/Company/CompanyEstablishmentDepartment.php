<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEstablishmentDepartment extends Model
{
    use HasFactory;

    protected $table = "company_establishment_departments";

    protected $fillable = [
        'department',
        'filter',
        'contact',
        'extension',
        'type_contact',
        'has_inventory_warehouse',
        'has_inventory_warehouse_center',
        'has_inventory_pharmacy',
        'has_inventory_pharmacy_center',
        'establishment_id'
    ];

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id');
    }
}
