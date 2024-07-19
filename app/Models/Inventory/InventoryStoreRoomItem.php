<?php

namespace App\Models\Inventory;

use App\Models\Consumable\Consumable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryStoreRoomItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'quantity_minimum',
        'quantity_maximum',
        'consumable_id',
        'inventory_store_room_id'
    ];
    

    public function Consumable(){
        return $this->belongsTo(Consumable::class,'consumable_id','id');
    }
}
