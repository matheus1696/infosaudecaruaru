<?php

namespace App\Models\Supply;

use App\Models\Region\RegionCity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyCompany extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'cnpj',
        'title',
        'surname',
        'filter',
        'address',
        'number',
        'district',
        'city_id',
        'contact_1',
        'contact_2',
        'email_1',
        'email_2',
        'latitude',
        'longitude',
        'status',
    ];

    public function RegionCity(){
        return $this->belongsTo(RegionCity::class,'city_id','id');
    }
}

