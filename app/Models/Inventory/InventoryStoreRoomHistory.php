<?php

namespace App\Models\Inventory;

use App\Models\Consumable\Consumable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryStoreRoomHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'consumable_id',
        'inventory_store_room_id',
        'movement',
        'user_id',
    ];

    public function Consumable(){
        return $this->belongsTo(Consumable::class,'consumable_id','id');
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
