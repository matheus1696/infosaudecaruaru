<?php

namespace App\Models\Inventory\Warehouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryWarehouseRequestStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status'
    ];
}
