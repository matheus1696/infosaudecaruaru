<?php

namespace App\Models\Inventory\Foodstuff;

use App\Models\Consumable\ConsumableType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryFoodstuffStandardRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'consumable_type_id',
        'status',
    ];

    public function ConsumableType(){
        return $this->belongsTo(ConsumableType::class,'consumable_type_id','id');
    }
}
