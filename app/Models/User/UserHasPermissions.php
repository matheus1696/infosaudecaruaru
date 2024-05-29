<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasPermissions extends Model
{
    use HasFactory;

    protected $table = "model_has_permissions";
    public $timestamps = false;

    protected $fillable = [
        'permission_id',
        'model_type',
        'model_id',
    ];
}

