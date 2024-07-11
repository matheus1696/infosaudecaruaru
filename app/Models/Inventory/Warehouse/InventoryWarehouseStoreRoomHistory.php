<?php

namespace App\Models\Inventory\Warehouse;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentWarehouse;
use App\Models\Consumable\Consumable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryWarehouseStoreRoomHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'movement',
        'consumable_id',
        'warehouse_id',
        'establishment_id',
        'user_id'
    ];

    public function Consumable(){
        return $this->belongsTo(Consumable::class,'consumable_id','id');
    }

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id');
    }
    
    public function CompanyEstablishmentWarehouse(){
        return $this->belongsTo(CompanyEstablishmentWarehouse::class,'warehouse_id','id');
    }
    
    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
