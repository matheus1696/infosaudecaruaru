<?php

namespace App\Models\Inventory;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Company\CompanyFinancialBlock;
use App\Models\Consumable\Consumable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryWarehouseCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'quantity_minimum',
        'quantity_maximum',
        'consumable_id',
        'department_id',
        'establishment_id',
        'financial_block_id',
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
    
    public function CompanyFinancialBlock(){
        return $this->belongsTo(CompanyFinancialBlock::class,'financial_block_id','id');
    }
}
