<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Administrador de Sistema',
            'filter'=>strtolower('Administrador de Sistema'),
            'email'=>'sysadmin@techsupport.com.br',
            'contact_1'=>'(81) 0000-0000',
            'contact_2'=>'(81) 0000-0000',
            'birthday'=>'1990-12-31',
            'email_verified_at'=>now(),
            'password'=> Hash::make('sysadmin'),
        ])->givePermissionTo('user','admin','sysadmin');

        User::create([
            'name'=>'Administrador',
            'filter'=>strtolower('Administrador'),
            'email'=>'admin@techsupport.com.br',
            'contact_1'=>'(81) 0000-0000',
            'contact_2'=>'(81) 0000-0000',
            'birthday'=>'1990-12-31',
            'email_verified_at'=>now(),
            'password'=> Hash::make('admin'),
        ])->givePermissionTo('user','admin');

        User::create([
            'name'=>'Usuário',
            'filter'=>strtolower('Usuário'),
            'email'=>'user@techsupport.com.br',
            'contact_1'=>'(81) 0000-0000',
            'contact_2'=>'(81) 0000-0000',
            'birthday'=>'1990-12-31',
            'email_verified_at'=>now(),
            'password'=> Hash::make('user'),
        ])->givePermissionTo('user');

        User::create([
            'name'=>'Verificar Email',
            'filter'=>strtolower('Verificar Email'),
            'email'=>'ve@techsupport.com.br',
            'contact_1'=>'(81) 0000-0000',
            'contact_2'=>'(81) 0000-0000',
            'birthday'=>'1990-12-31',
            'password'=> Hash::make('verificar'),
        ])->givePermissionTo('user');
    }
}
