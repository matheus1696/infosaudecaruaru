<?php

namespace Database\Seeders;

use App\Models\Consumable\ConsumableClassification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsumableClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ConsumableClassification::create(['title'=>'Permanente', 'filter'=>'permanente']);
        ConsumableClassification::create(['title'=>'Consumo', 'filter'=>'consumo']);
    }
}
