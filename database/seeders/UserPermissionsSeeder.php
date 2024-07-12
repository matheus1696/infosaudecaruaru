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
        UserPermissions::create(['name'=>'sysadmin','guard_name'=>'web']);
        UserPermissions::create(['name'=>'admin','guard_name'=>'web']);
        UserPermissions::create(['name'=>'user','guard_name'=>'web']);
        UserPermissions::create(['name'=>'inventory_warehouse_store_room','guard_name'=>'web']);
        UserPermissions::create(['name'=>'inventory_warehouse_center','guard_name'=>'web']);
    }
}
