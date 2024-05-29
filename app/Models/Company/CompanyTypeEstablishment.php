<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyTypeEstablishment extends Model
{
    use HasFactory;

    protected $table = 'company_type_establishments';

    protected $fillable =
    [
        'title',
        'status',
    ];

    public function Establishment(){
        return $this->belongsTo(CompanyEstablishment::class,'id','type_establishment_id');
    }
}

