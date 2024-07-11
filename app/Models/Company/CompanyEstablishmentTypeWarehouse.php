<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEstablishmentTypeWarehouse extends Model
{
    use HasFactory;

    protected $table = "company_establishment_type_warehouses";

    protected $fillable = [
        'title',
        'filter',
        'acronym',
        'status',
    ];
}
