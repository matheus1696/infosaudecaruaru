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
        InventoryWarehouseRequestStatus::create(['title'=>'Não Enviado', 'filter'=>strtolower('Não_Enviado'), 'color'=>'purple']);
        InventoryWarehouseRequestStatus::create(['title'=>'Aberto', 'filter'=>strtolower('Aberto'), 'color'=>'yellow']);
        InventoryWarehouseRequestStatus::create(['title'=>'Separação', 'filter'=>strtolower('Separação'), 'color'=>'sky']);
        InventoryWarehouseRequestStatus::create(['title'=>'Rota de Entrega', 'filter'=>strtolower('Rota_de_Entrega'), 'color'=>'orange']);
        InventoryWarehouseRequestStatus::create(['title'=>'Concluído', 'filter'=>strtolower('Concluído'), 'color'=>'green']);
        InventoryWarehouseRequestStatus::create(['title'=>'Cancelado', 'filter'=>strtolower('Cancelado'), 'color'=>'red']);
    }
}
