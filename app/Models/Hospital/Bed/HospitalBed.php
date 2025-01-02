<?php

namespace App\Models\Hospital\Bed;

use App\Models\Company\CompanyEstablishment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalBed extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'filter',
        'status',
        'operational_status_id',
        'classification_id',
        'establishment_id'
    ];

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id');
    }

    public function HospitalBedClassification(){
        return $this->belongsTo(HospitalBedClassification::class,'classification_id','id');
    }

    public function HospitalBedStatus(){
        return $this->belongsTo(HospitalBedStatus::class,'operational_status_id','id');
    }
}
