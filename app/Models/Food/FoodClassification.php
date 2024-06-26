<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodClassification extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'title',
        'filter',
        'status'
    ];
}
