<?php

namespace App\Models\Inventory\Foodstuff;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Food\Food;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryFoodstuffStoreRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'quantity_minimum',
        'quantity_maximum',
        'food_id',
        'department_id',
        'establishment_id',
    ];

    public function Food(){
        return $this->belongsTo(Food::class,'food_id','id')->orderBy('title');
    }

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id')->orderBy('title');
    }
    
    public function CompanyEstablishmentDepartment(){
        return $this->belongsTo(CompanyEstablishmentDepartment::class,'department_id','id')->orderBy('department');
    }
}
