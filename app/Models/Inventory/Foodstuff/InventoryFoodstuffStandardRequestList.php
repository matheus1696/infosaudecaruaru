<?php

namespace App\Models\Inventory\Foodstuff;

use App\Models\Consumable\Consumable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryFoodstuffStandardRequestList extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'quantity',
        'consumable_id',
        'standard_request_id',
    ];    

    public function Consumable(){
        return $this->belongsTo(Consumable::class,'consumable_id','id');
    }
}
