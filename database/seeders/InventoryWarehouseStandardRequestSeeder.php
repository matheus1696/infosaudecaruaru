<?php

namespace Database\Seeders;

use App\Models\Inventory\InventoryWarehouseStandardRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventoryWarehouseStandardRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        InventoryWarehouseStandardRequest::create(['title'=>'Lista materiais de expediente']);
        InventoryWarehouseStandardRequest::create(['title'=>'Lista materiais de limpeza']);
        InventoryWarehouseStandardRequest::create(['title'=>'Lista materiais de apoio']);
    }
}
