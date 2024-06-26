<?php

namespace App\Models\Inventory\Warehouse;

use App\Models\Consumable\ConsumableType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryWarehouseStandardRequest extends Model
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
