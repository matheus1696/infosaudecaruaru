<?php

namespace App\Models\Profile;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyOccupation;
use App\Models\Company\CompanyOrganization;
use App\Models\User\UserSex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = "users";

    protected $fillable =
    [
        'name',
        'password',
        'cpf',
        'registration',
        'contact_1',
        'contact_2',
        'birthday',
        'sex_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function SexualOrientation(){
        return $this->belongsTo(UserSex::class,'sex_id','id');
    }

    public function CompanyOccupation(){
        return $this->belongsTo(CompanyOccupation::class,'cbo_id','id');
    }

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class,'establishment_id','id');
    }

    public function CompanyOrganization(){
        return $this->belongsTo(CompanyOrganization::class,'organization_id','id');
    }
}
