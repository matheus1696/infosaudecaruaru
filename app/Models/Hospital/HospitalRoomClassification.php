<?php

namespace App\Models\Hospital;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalRoomClassification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
    ];
}
