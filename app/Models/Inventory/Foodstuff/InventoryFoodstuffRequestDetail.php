<?php

namespace App\Models\Inventory\Foodstuff;

use App\Models\Food\Food;
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
        'food_id',
        'store_room_request_id',
    ];

    public function Food(){
        return $this->belongsTo(Food::class,'food_id','id')->orderBy('title');
    }

    public function InventoryFoodstuffRequest(){
        return $this->belongsTo(InventoryFoodstuffRequest::class,'store_room_request_id','id')->orderBy('title');
    }
}
