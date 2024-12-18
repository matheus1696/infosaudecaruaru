<?php

namespace App\Models\Professional;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalDoctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'filter',
        'crm',
        'specialty',
        'contact_1',
        'contact_2',
        'status',
    ];
}
