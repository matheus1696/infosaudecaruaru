<?php

namespace Database\Seeders;

use App\Models\User\UserSex;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserSex::create([
            'sex'=>'Masculino',
            'status'=>true,
        ]);

        UserSex::create([
            'sex'=>'Feminino',
            'status'=>true,
        ]);

        UserSex::create([
            'sex'=>'Não Definido',
            'status'=>true,
        ]);
    }
}
