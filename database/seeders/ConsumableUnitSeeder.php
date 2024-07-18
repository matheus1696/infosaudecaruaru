<?php

namespace Database\Seeders;

use App\Models\Consumable\ConsumableUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsumableUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ConsumableUnit::create(['acronym'=>'UND', 'title'=>'Unidade', 'filter'=>'unidade' ]);
        ConsumableUnit::create(['acronym'=>'BNG', 'title'=>'Bisnaga', 'filter'=>'bisnaga' ]);
        ConsumableUnit::create(['acronym'=>'FRAS', 'title'=>'Frasco', 'filter'=>'frasco' ]);
        ConsumableUnit::create(['acronym'=>'LIQ', 'title'=>'Liquido', 'filter'=>'liguido' ]);
        ConsumableUnit::create(['acronym'=>'SCH', 'title'=>'Sachê', 'filter'=>'sachê' ]);
        ConsumableUnit::create(['acronym'=>'CX', 'title'=>'Caixa', 'filter'=>'caixa' ]);
        ConsumableUnit::create(['acronym'=>'RSM', 'title'=>'Resma', 'filter'=>'resma' ]);
    }
}
