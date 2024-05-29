<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyOrganization extends Model
{
    use HasFactory;

    protected $table = 'company_organizations';

    protected $fillable = [
        'title',
        'acronym',
        'filter',
        'description',
        'linked_users',
        'status',
        'order',
        'hierarchy',
        'number_hierarchy',
    ];
}

