<?php

namespace App\Models\Consumable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumableUnit extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'code',
        'title',
        'filter',
        'description',
        'status'
    ];
}
