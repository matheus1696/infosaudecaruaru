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
        InventoryWarehouseStandardRequest::create(['title'=>'Lista Padrão para Pedido de Materiais de Expedientes','consumable_type_id'=>2]);
        InventoryWarehouseStandardRequest::create(['title'=>'Lista Padrão para Pedido de Materiais de Limpeza','consumable_type_id'=>3]);
        InventoryWarehouseStandardRequest::create(['title'=>'Lista Padrão para Pedido de Materiais de Apoio','consumable_type_id'=>1]);
    }
}
