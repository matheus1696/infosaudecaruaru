<?php

namespace App\Models\Extra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelacaoProfissionais extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
        'nome',
        'cpf',
        'admissao',
        'lotacao',
        'cargo',
        'apto_extra'
    ];
}
