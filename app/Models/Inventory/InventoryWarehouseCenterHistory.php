<?php

namespace App\Models\Inventory;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Consumable\Consumable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryWarehouseCenterHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'supply_order',
        'supply_company',
        'quantity',
        'movement',
        'consumable_id',
        'department_id',
        'establishment_id',
        'user_id'
    ];

    public function Consumable(){
        return $this->belongsTo(Consumable::class,'consumable_id','id');
    }

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id');
    }
    
    public function CompanyEstablishmentDepartment(){
        return $this->belongsTo(CompanyEstablishmentDepartment::class,'department_id','id');
    }
    
    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
