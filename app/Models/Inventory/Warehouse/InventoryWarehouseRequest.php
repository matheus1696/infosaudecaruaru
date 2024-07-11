<?php

namespace App\Models\Inventory\Warehouse;

use App\Models\Company\CompanyEstablishmentWarehouse;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryWarehouseRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'warehouse_contact',
        'warehouse_extension',
        'user_contact_1',
        'user_contact_2',
        'status_id',
        'warehouse_id',
        'user_id',
    ];

    
    
    public function InventoryWarehouseRequestStatus(){
        return $this->belongsTo(InventoryWarehouseRequestStatus::class,'status_id','id');
    }
    
    public function CompanyEstablishmentWarehouse(){
        return $this->belongsTo(CompanyEstablishmentWarehouse::class,'warehouse_id','id');
    }
    
    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
