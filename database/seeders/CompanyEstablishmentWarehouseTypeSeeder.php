<?php

namespace Database\Seeders;

use App\Models\Company\Warehouse\CompanyEstablishmentWarehouseType;
use Illuminate\Database\Seeder;

class CompanyEstablishmentWarehouseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CompanyEstablishmentWarehouseType::create([
            'title'=>'Almoxarifado',
            'filter'=>strtolower('Almoxarifado'),
            'type'=>'store_room',
            'acronym'=>'ALX',
        ]);
        CompanyEstablishmentWarehouseType::create([
            'title'=>'Centro de Distribuição de Suprimentos',
            'filter'=>strtolower('Centro de Distribuição de Suprimentos'),
            'type'=>'center',
            'acronym'=>'CDS',
        ]);
        CompanyEstablishmentWarehouseType::create([
            'title'=>'Farmácia',
            'filter'=>strtolower('Farmácia'),
            'type'=>'store_room',
            'acronym'=>'FAR',
        ]);
        CompanyEstablishmentWarehouseType::create([
            'title'=>'Centro de Abastecimento Farmacêutico',
            'filter'=>strtolower('Centro de Abastecimento Farmacêutico'),
            'type'=>'center',
            'acronym'=>'CAF',
        ]);
        CompanyEstablishmentWarehouseType::create([
            'title'=>'Almoxarifado de Gêneros Alimentícios',
            'filter'=>strtolower('Almoxarifado de Gêneros Alimentícios'),
            'type'=>'store_room',
            'acronym'=>'AGA',
        ]);
        CompanyEstablishmentWarehouseType::create([
            'title'=>'Centro de Gêneros Alimentícios',
            'filter'=>strtolower('Centro de Gêneros Alimentícios'),
            'type'=>'center',
            'acronym'=>'CGA',
        ]);
    }
}
