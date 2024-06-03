<?php

namespace App\Models\Inventory;

use App\Models\Consumable\Consumable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryWarehouseStoreRoomRequestDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'consumable_id',
        'store_room_request_id',
    ];

    public function Consumable(){
        return $this->belongsTo(Consumable::class,'consumable_id','id');
    }
}
