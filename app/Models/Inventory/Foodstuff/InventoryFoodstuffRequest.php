<?php

namespace App\Models\Inventory\Foodstuff;

use App\Models\Company\CompanyEstablishmentDepartment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryFoodstuffRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'department_contact',
        'department_extension',
        'user_contact_1',
        'user_contact_2',
        'count',
        'status',
        'department_id',
        'user_id',
    ];
    
    public function CompanyEstablishmentDepartment(){
        return $this->belongsTo(CompanyEstablishmentDepartment::class,'department_id','id');
    }
    
    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}