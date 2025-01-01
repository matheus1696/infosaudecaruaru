<?php

namespace App\Models\Hospital\Bed;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalBedClassification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
    ];
}
