<?php

namespace Database\Seeders;

use App\Models\Consumable\ConsumableType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsumableTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ConsumableType::create(['title'=>'Apoio', 'filter'=>'apoio' ]);
        ConsumableType::create(['title'=>'Expediente', 'filter'=>'expediente' ]);
        ConsumableType::create(['title'=>'Limpeza', 'filter'=>'limpeza' ]);
    }
}
