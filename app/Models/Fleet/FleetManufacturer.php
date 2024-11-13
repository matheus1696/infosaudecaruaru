<?php

namespace App\Models\Fleet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetManufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer'
    ];
}
