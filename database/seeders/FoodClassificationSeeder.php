<?php

namespace Database\Seeders;

use App\Models\Food\FoodClassification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        FoodClassification::create(['title'=>'Permanente', 'filter'=>'permanente']);
        FoodClassification::create(['title'=>'Consumo', 'filter'=>'consumo']);
    }
}
