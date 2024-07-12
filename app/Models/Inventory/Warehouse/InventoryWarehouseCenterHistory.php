<?php

namespace App\Models\Inventory\Warehouse;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentWarehouse;
use App\Models\Company\CompanyFinancialBlock;
use App\Models\Consumable\Consumable;
use App\Models\Supply\SupplyCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryWarehouseCenterHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'supply_order',
        'supply_order_parcel',
        'supply_company_id',
        'quantity',
        'movement',
        'consumable_id',
        'incoming_warehouse_id',
        'incoming_establishment_id',
        'output_warehouse_id',
        'output_establishment_id',
        'financial_block_id',
        'user_id'
    ];

    public function Consumable(){
        return $this->belongsTo(Consumable::class,'consumable_id','id');
    }

    public function SupplyCompany(){
        return $this->belongsTo(SupplyCompany::class,'supply_company_id','id');
    }

    public function CompanyEstablishmentIncoming(){
        return $this->belongsTo(CompanyEstablishment::class,'incoming_establishment_id','id');
    }
    
    public function CompanyEstablishmentWarehouseIncoming(){
        return $this->belongsTo(CompanyEstablishmentWarehouse::class,'incoming_warehouse_id','id');
    }

    public function CompanyEstablishmentOutput(){
        return $this->belongsTo(CompanyEstablishment::class,'output_establishment_id','id');
    }
    
    public function CompanyEstablishmentWarehouseOutput(){
        return $this->belongsTo(CompanyEstablishmentWarehouse::class,'output_warehouse_id','id');
    }
    
    public function CompanyFinancialBlock(){
        return $this->belongsTo(CompanyFinancialBlock::class,'financial_block_id','id');
    }
    
    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
