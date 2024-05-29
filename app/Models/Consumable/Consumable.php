<?php

namespace App\Models\Consumable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'code',
        'title',
        'filter',
        'description',
        'consumable_classification_id',
        'consumable_unit_id',
        'consumable_type_id',
        'status'
    ];

    public function ConsumableClassification(){
        return $this->belongsTo(ConsumableClassification::class,'consumable_classification_id','id');
    }

    public function ConsumableType(){
        return $this->belongsTo(ConsumableType::class,'consumable_type_id','id');
    }

    public function ConsumableUnit(){
        return $this->belongsTo(ConsumableUnit::class,'consumable_unit_id','id');
    }
}
