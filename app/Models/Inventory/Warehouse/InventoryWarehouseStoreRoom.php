<?php

namespace App\Models\Inventory\Warehouse;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentWarehouse;
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
        'warehouse_id',
        'establishment_id',
    ];

    public function Consumable(){
        return $this->belongsTo(Consumable::class,'consumable_id','id')->orderBy('title');
    }

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id')->orderBy('title');
    }
    
    public function CompanyEstablishmentWarehouse(){
        return $this->belongsTo(CompanyEstablishmentWarehouse::class,'warehouse_id','id')->orderBy('title');
    }
}
