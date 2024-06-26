<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'code',
        'title',
        'filter',
        'description',
        'food_classification_id',
        'food_unit_id',
        'food_type_id',
        'status'
    ];

    public function FoodClassification(){
        return $this->belongsTo(FoodClassification::class,'food_classification_id','id');
    }

    public function FoodType(){
        return $this->belongsTo(FoodType::class,'food_type_id','id');
    }

    public function FoodUnit(){
        return $this->belongsTo(FoodUnit::class,'food_unit_id','id');
    }
}
