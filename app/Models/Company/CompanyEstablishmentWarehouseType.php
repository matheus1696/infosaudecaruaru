<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEstablishmentWarehouseType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'filter',
        'type',
        'acronym',
        'status',
    ];
}
