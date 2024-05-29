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
        UserPermissions::create(['name'=>'inventory_warehouse','guard_name'=>'web']);
        UserPermissions::create(['name'=>'inventory_warehouse_center','guard_name'=>'web']);
        UserPermissions::create(['name'=>'inventory_pharmacy','guard_name'=>'web']);
        UserPermissions::create(['name'=>'inventory_pharmacy_center','guard_name'=>'web']);
        UserPermissions::create(['name'=>'inventory_warehouse_permission','guard_name'=>'web']);
        UserPermissions::create(['name'=>'inventory_warehouse_center_permission','guard_name'=>'web']);
        UserPermissions::create(['name'=>'inventory_pharmacy_permission','guard_name'=>'web']);
        UserPermissions::create(['name'=>'inventory_pharmacy_center_permission','guard_name'=>'web']);
    }
}
