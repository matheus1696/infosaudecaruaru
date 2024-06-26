<?php

namespace Database\Seeders;

use App\Models\Food\FoodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        FoodType::create(['title'=>'Apoio', 'filter'=>'apoio' ]);
        FoodType::create(['title'=>'Expediente', 'filter'=>'expediente' ]);
        FoodType::create(['title'=>'Limpeza', 'filter'=>'limpeza' ]);
    }
}
