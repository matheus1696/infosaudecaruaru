<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEstablishmentDepartment extends Model
{
    use HasFactory;

    protected $table = "company_establishment_departments";

    protected $fillable = [
        'title',
        'filter',
        'contact',
        'extension',
        'type_contact',
        'has_inventory_warehouse_store_room',
        'has_inventory_warehouse_center',
        'has_inventory_pharmacy_store_room',
        'has_inventory_pharmacy_center',
        'has_inventory_foodstuff_store_room',
        'has_inventory_foodstuff_center',
        'establishment_id'
    ];

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id');
    }
}
