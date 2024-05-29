<?php

namespace Database\Seeders;

use App\Models\Medication\MedicationUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicationUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        MedicationUnit::create(['code'=>'UND', 'title'=>'Unidade', 'filter'=>'unidade' ]);
        MedicationUnit::create(['code'=>'BNG', 'title'=>'Bisnaga', 'filter'=>'bisnaga' ]);
        MedicationUnit::create(['code'=>'COMP', 'title'=>'Comprimido', 'filter'=>'comprimido' ]);
        MedicationUnit::create(['code'=>'FRAS', 'title'=>'Frasco', 'filter'=>'frasco' ]);
        MedicationUnit::create(['code'=>'AMP', 'title'=>'Ampola', 'filter'=>'ampola' ]);
        MedicationUnit::create(['code'=>'LIQ', 'title'=>'Liquido', 'filter'=>'liguido' ]);
        MedicationUnit::create(['code'=>'SCH', 'title'=>'Sachê', 'filter'=>'sachê' ]);
        MedicationUnit::create(['code'=>'CX', 'title'=>'Caixa', 'filter'=>'caixa' ]);
    }
}
