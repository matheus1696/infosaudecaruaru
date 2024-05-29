<?php

namespace App\Models\Medication;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationClassification extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'title',
        'filter',
        'status'
    ];
}
