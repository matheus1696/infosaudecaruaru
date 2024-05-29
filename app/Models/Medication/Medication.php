<?php

namespace App\Models\Medication;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'code',
        'title',
        'filter',
        'description',
        'medication_classification_id',
        'medication_unit_id',
        'medication_type_id',
        'status'
    ];

    public function MedicationClassification(){
        return $this->belongsTo(MedicationClassification::class,'medication_classification_id','id');
    }

    public function MedicationType(){
        return $this->belongsTo(MedicationType::class,'medication_type_id','id');
    }

    public function MedicationUnit(){
        return $this->belongsTo(MedicationUnit::class,'medication_unit_id','id');
    }
}
