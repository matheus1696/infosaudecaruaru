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
        ConsumableUnit::create(['code'=>'UND', 'title'=>'Unidade', 'filter'=>'unidade' ]);
        ConsumableUnit::create(['code'=>'BNG', 'title'=>'Bisnaga', 'filter'=>'bisnaga' ]);
        ConsumableUnit::create(['code'=>'FRAS', 'title'=>'Frasco', 'filter'=>'frasco' ]);
        ConsumableUnit::create(['code'=>'LIQ', 'title'=>'Liquido', 'filter'=>'liguido' ]);
        ConsumableUnit::create(['code'=>'SCH', 'title'=>'Sachê', 'filter'=>'sachê' ]);
        ConsumableUnit::create(['code'=>'CX', 'title'=>'Caixa', 'filter'=>'caixa' ]);
        ConsumableUnit::create(['code'=>'RSM', 'title'=>'Resma', 'filter'=>'resma' ]);
    }
}
