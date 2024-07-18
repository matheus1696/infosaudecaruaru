<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseStoreRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'establishment_id'
    ];
}
