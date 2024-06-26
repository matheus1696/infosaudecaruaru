<?php

namespace App\Models\Inventory\Foodstuff;

use App\Models\Consumable\Consumable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryFoodstuffRequestDetail extends Model
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

    public function InventoryFoodstuffRequest(){
        return $this->belongsTo(InventoryFoodstuffRequest::class,'store_room_request_id','id')->orderBy('title');
    }
}
