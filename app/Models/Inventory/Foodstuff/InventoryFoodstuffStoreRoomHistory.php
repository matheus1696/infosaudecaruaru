<?php

namespace App\Models\Inventory\Foodstuff;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\Food\Food;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryFoodstuffStoreRoomHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'movement',
        'food_id',
        'department_id',
        'establishment_id',
        'user_id'
    ];

    public function Food(){
        return $this->belongsTo(Food::class,'food_id','id');
    }

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id');
    }
    
    public function CompanyEstablishmentDepartment(){
        return $this->belongsTo(CompanyEstablishmentDepartment::class,'department_id','id');
    }
    
    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
