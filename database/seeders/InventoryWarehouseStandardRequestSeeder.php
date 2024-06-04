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
        InventoryWarehouseStandardRequest::create(['title'=>'Lista Materiais de Expedientes (Unidades Básicas)','consumable_type_id'=>1]);
        InventoryWarehouseStandardRequest::create(['title'=>'Lista Materiais de Expedientes (Unidades 24Hrs)','consumable_type_id'=>1]);
        InventoryWarehouseStandardRequest::create(['title'=>'Lista Materiais de Expedientes (AMEs)','consumable_type_id'=>1]);
        InventoryWarehouseStandardRequest::create(['title'=>'Lista Materiais de Expedientes (Departamentos)','consumable_type_id'=>1]);
        InventoryWarehouseStandardRequest::create(['title'=>'Lista Materiais de Apoio','consumable_type_id'=>2]);
        InventoryWarehouseStandardRequest::create(['title'=>'Lista Materiais de Apoio (Unidades 24Hrs)','consumable_type_id'=>2]);
        InventoryWarehouseStandardRequest::create(['title'=>'Lista Materiais de Limpeza','consumable_type_id'=>3]);
    }
}
