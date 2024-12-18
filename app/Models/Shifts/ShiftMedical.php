<?php

namespace App\Models\Shifts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftMedical extends Model
{
    use HasFactory;

    protected $fillable = [
        'shift_date',
        'start_time',
        'end_time',
        'doctor_id',
        'establishment_id',
    ];
}
