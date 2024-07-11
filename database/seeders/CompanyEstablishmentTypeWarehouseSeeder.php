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
    }
}
