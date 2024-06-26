<?php

namespace App\Models\Inventory\Warehouse;

use App\Models\Consumable\Consumable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryWarehouseRequestDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'quantity_default',
        'quantity_current',
        'quantity_forwarded',
        'confirmed',
        'consumable_id',
        'store_room_request_id',
    ];

    public function Consumable(){
        return $this->belongsTo(Consumable::class,'consumable_id','id')->orderBy('title');
    }

    public function InventoryWarehouseRequest(){
        return $this->belongsTo(InventoryWarehouseRequest::class,'store_room_request_id','id')->orderBy('title');
    }
}
