<?php

namespace App\Models\Inventory;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryStoreRoomPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'inventory_store_room_id',
    ];

    public function InventoryStoreRoom(){
        return $this->belongsTo(InventoryStoreRoom::class,'inventory_store_room_id','id');
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
