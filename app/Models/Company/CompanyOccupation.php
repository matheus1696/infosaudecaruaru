<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyOccupation extends Model
{
    use HasFactory;

    protected $table = 'company_occupations';

    protected $fillable =
    [
        'code',
        'title',
        'filter',
        'status',
    ];
}

