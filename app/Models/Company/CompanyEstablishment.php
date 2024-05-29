<?php

namespace App\Models\Company;

use App\Models\Region\RegionCity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEstablishment extends Model
{
    use HasFactory;

    protected $table = 'company_establishments';

    protected $fillable =
    [
        'code',
        'title',
        'surname',
        'filter',
        'address',
        'number',
        'district',
        'city_id',
        'latitude',
        'longitude',
        'type_establishment_id',
        'financial_block_id',
        'has_inventory',
        'status',
    ];

    public function RegionCity(){
        return $this->belongsTo(RegionCity::class,'city_id','id');
    }

    public function TypeEstablishment(){
        return $this->belongsTo(CompanyTypeEstablishment::class,'type_establishment_id','id');
    }

    public function FinancialBlock(){
        return $this->belongsTo(CompanyFinancialBlock::class,'financial_block_id','id');
    }
}

