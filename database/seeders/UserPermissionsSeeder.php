<?php

namespace Database\Seeders;

use App\Models\User\UserPermissions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserPermissions::create(['name'=>'sysadmin','guard_name'=>'web','translator'=>'Super Usuário']);
        UserPermissions::create(['name'=>'admin','guard_name'=>'web','translator'=>'Usuário Administrador']);
        UserPermissions::create(['name'=>'user','guard_name'=>'web','translator'=>'Usuário Comum']);
        UserPermissions::create(['name'=>'inventory_store_room','guard_name'=>'web','translator'=>'Almoxarifado']);
        UserPermissions::create(['name'=>'inventory_center','guard_name'=>'web','translator'=>'Almoxarifado Central']);
        UserPermissions::create(['name'=>'shift_medical','guard_name'=>'web','translator'=>'Plantão Médico']);
    }
}
