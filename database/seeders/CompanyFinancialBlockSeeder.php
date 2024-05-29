<?php

namespace Database\Seeders;

use App\Models\Company\CompanyFinancialBlock;
use Illuminate\Database\Seeder;

class CompanyFinancialBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CompanyFinancialBlock::create([
            'title'=>'Administração',
            'color'=>'bg-green-600',
            'acronym'=>'ADM',
        ]);

        CompanyFinancialBlock::create([
            'title'=>'Atenção Especializada',
            'color'=>'bg-red-600',
            'acronym'=>'ATE',
        ]);

        CompanyFinancialBlock::create([
            'title'=>'Atenção Básica',
            'color'=>'bg-blue-600',
            'acronym'=>'ATB',
        ]);

        CompanyFinancialBlock::create([
            'title'=>'Vigilância Epdemiológica',
            'color'=>'bg-green-600',
            'acronym'=>'VEPD',
        ]);

        CompanyFinancialBlock::create([
            'title'=>'Vigilância Sanitária',
            'color'=>'bg-green-600',
            'acronym'=>'VSAN',
        ]);
    }
}
