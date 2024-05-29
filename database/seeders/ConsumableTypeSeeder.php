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
        ConsumableType::create(['title'=>'Papelaria', 'filter'=>'papelaria' ]);
        ConsumableType::create(['title'=>'Limpeza', 'filter'=>'limpeza' ]);
    }
}
