<?php

namespace App\Models\Inventory\Foodstuff;

use App\Models\Food\FoodType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryFoodstuffStandardRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'food_type_id',
        'status',
    ];

    public function FoodType(){
        return $this->belongsTo(FoodType::class,'food_type_id','id');
    }
}
