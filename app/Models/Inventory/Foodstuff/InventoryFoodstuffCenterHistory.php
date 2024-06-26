<?php

namespace App\Models\Inventory\Foodstuff;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Consumable\Consumable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryFoodstuffCenterHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'supply_order',
        'supply_order_parcel',
        'supply_company',
        'quantity',
        'movement',
        'consumable_id',
        'incoming_department_id',
        'incoming_establishment_id',
        'output_department_id',
        'output_establishment_id',
        'financial_block_id',
        'user_id'
    ];

    public function Consumable(){
        return $this->belongsTo(Consumable::class,'consumable_id','id');
    }

    public function CompanyEstablishmentIncoming(){
        return $this->belongsTo(CompanyEstablishment::class,'incoming_establishment_id','id');
    }
    
    public function CompanyEstablishmentDepartmentIncoming(){
        return $this->belongsTo(CompanyEstablishmentDepartment::class,'incoming_department_id','id');
    }

    public function CompanyEstablishmentOutput(){
        return $this->belongsTo(CompanyEstablishment::class,'output_establishment_id','id');
    }
    
    public function CompanyEstablishmentDepartmentOutput(){
        return $this->belongsTo(CompanyEstablishmentDepartment::class,'output_department_id','id');
    }
    
    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
