<?php

namespace App\Models\Consumable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumableClassification extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'title',
        'filter',
        'status'
    ];
}
