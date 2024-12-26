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
        UserPermissions::create(['name'=>'admin','guard_name'=>'web','translator'=>'Administrador de Sistema']);
        UserPermissions::create(['name'=>'user','guard_name'=>'web','translator'=>'Usuário Padrão']);
        UserPermissions::create(['name'=>'inventory_store_room','guard_name'=>'web','translator'=>'Gestão de Almoxarifado']);
        UserPermissions::create(['name'=>'inventory_center','guard_name'=>'web','translator'=>'Centro de Armazenamento']);
        UserPermissions::create(['name'=>'shift_medical','guard_name'=>'web','translator'=>'Gestão de Plantões Médicos']);
        UserPermissions::create(['name'=>'dashboard_shift_medical','guard_name'=>'web','translator'=>'Painel Plantões Médicos']);
        UserPermissions::create(['name'=>'professional_doctor','guard_name'=>'web','translator'=>'Gestão de Profissionais Médicos']);
    }
}
