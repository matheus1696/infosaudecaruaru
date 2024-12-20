<?php

namespace App\Models\Shifts;

use App\Models\Company\CompanyEstablishment;
use App\Models\Professional\ProfessionalDoctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftMedical extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'doctor_id',
        'establishment_id',
    ];

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id');
    }

    public function ProfessionalDoctor(){
        return $this->belongsTo(ProfessionalDoctor::class,'doctor_id','id');
    }
}
