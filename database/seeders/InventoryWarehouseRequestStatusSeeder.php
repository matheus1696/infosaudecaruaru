<?php

namespace Database\Seeders;

use App\Models\Inventory\Warehouse\InventoryWarehouseRequestStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventoryWarehouseRequestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        InventoryWarehouseRequestStatus::create(['title'=>'Aberto']);
        InventoryWarehouseRequestStatus::create(['title'=>'Separação']);
        InventoryWarehouseRequestStatus::create(['title'=>'Rota de Entrega']);
        InventoryWarehouseRequestStatus::create(['title'=>'Concluído']);
        InventoryWarehouseRequestStatus::create(['title'=>'Cancelado']);
    }
}
