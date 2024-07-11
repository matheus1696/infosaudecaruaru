<?php

namespace Database\Seeders;

use App\Models\Company\CompanyEstablishmentTypeWarehouse;
use Illuminate\Database\Seeder;

class CompanyEstablishmentTypeWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CompanyEstablishmentTypeWarehouse::create([
            'title'=>'Almoxarifado',
            'filter'=>strtolower('Almoxarifado'),
            'acronym'=>'ALX',
        ]);
        CompanyEstablishmentTypeWarehouse::create([
            'title'=>'Centro de Distribuição de Suprimentos',
            'filter'=>strtolower('Centro de Distribuição de Suprimentos'),
            'acronym'=>'CDS',
        ]);
        CompanyEstablishmentTypeWarehouse::create([
            'title'=>'Farmácia',
            'filter'=>strtolower('Farmácia'),
            'acronym'=>'FAR',
        ]);
        CompanyEstablishmentTypeWarehouse::create([
            'title'=>'Centro de Abastecimento Farmacêutico',
            'filter'=>strtolower('Centro de Abastecimento Farmacêutico'),
            'acronym'=>'CAF',
        ]);
        CompanyEstablishmentTypeWarehouse::create([
            'title'=>'Almoxarifado de Gêneros Alimentícios',
            'filter'=>strtolower('Almoxarifado de Gêneros Alimentícios'),
            'acronym'=>'AGA',
        ]);
        CompanyEstablishmentTypeWarehouse::create([
            'title'=>'Centro de Gêneros Alimentícios',
            'filter'=>strtolower('Centro de Gêneros Alimentícios'),
            'acronym'=>'CGA',
        ]);
    }
}
