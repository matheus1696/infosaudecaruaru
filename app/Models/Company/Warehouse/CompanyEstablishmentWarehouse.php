<?php

namespace App\Models\Company\Warehouse;

use App\Models\Company\CompanyEstablishment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEstablishmentWarehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'filter',
        'status',
        'type_warehouse_id',
        'establishment_id',
    ];

    public function CompanyEstablishmentWarehouseType(){
        return $this->belongsTo(CompanyEstablishmentWarehouseType::class,'type_warehouse_id','id');
    }

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id');
    }
}
