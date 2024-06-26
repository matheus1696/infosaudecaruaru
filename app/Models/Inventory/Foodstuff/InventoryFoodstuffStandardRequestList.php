<?php

namespace App\Models\Inventory\Foodstuff;

use App\Models\Food\Food;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryFoodstuffStandardRequestList extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'quantity',
        'food_id',
        'standard_request_id',
    ];    

    public function Food(){
        return $this->belongsTo(Food::class,'food_id','id');
    }
}
