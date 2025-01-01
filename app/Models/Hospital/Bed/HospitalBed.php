<?php

namespace App\Models\Hospital\Bed;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalBed extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'status',
        'room_classification_id',
        'establishment_id'
    ];
}
