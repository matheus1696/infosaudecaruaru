<?php

namespace App\Models\Inventory\Warehouse;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Consumable\Consumable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryWarehouseStoreRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'quantity_minimum',
        'quantity_maximum',
        'consumable_id',
        'department_id',
        'establishment_id',
    ];

    public function Consumable(){
        return $this->belongsTo(Consumable::class,'consumable_id','id')->orderBy('title');
    }

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id')->orderBy('title');
    }
    
    public function CompanyEstablishmentDepartment(){
        return $this->belongsTo(CompanyEstablishmentDepartment::class,'department_id','id')->orderBy('department');
    }
}
