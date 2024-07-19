<?php

namespace App\Models\Inventory;

use App\Models\Company\CompanyEstablishment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryStoreRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'establishment_id'
    ];

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id');
    }
}