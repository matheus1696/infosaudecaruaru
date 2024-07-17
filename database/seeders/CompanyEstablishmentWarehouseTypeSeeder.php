<?php

namespace Database\Seeders;

use App\Models\Company\CompanyEstablishmentWarehouseType;
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
            'acronym'=>'ALX',
        ]);
        CompanyEstablishmentWarehouseType::create([
            'title'=>'Centro de Distribuição de Suprimentos',
            'filter'=>strtolower('Centro de Distribuição de Suprimentos'),
            'acronym'=>'CDS',
        ]);
        CompanyEstablishmentWarehouseType::create([
            'title'=>'Farmácia',
            'filter'=>strtolower('Farmácia'),
            'acronym'=>'FAR',
        ]);
        CompanyEstablishmentWarehouseType::create([
            'title'=>'Centro de Abastecimento Farmacêutico',
            'filter'=>strtolower('Centro de Abastecimento Farmacêutico'),
            'acronym'=>'CAF',
        ]);
        CompanyEstablishmentWarehouseType::create([
            'title'=>'Almoxarifado de Gêneros Alimentícios',
            'filter'=>strtolower('Almoxarifado de Gêneros Alimentícios'),
            'acronym'=>'AGA',
        ]);
        CompanyEstablishmentWarehouseType::create([
            'title'=>'Centro de Gêneros Alimentícios',
            'filter'=>strtolower('Centro de Gêneros Alimentícios'),
            'acronym'=>'CGA',
        ]);
    }
}
