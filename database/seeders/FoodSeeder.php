<?php

namespace Database\Seeders;

use App\Models\Food\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Food::create(['title'=>'Alfinete colorido', 'filter'=>'alfinete colorido', 'description'=>'', 'food_unit_id'=>'6', 'food_type_id'=>'2', 'food_classification_id'=>'2']);
        Food::create(['title'=>'Almofada para carimbo n° 03 azul, preta e vermelha.', 'filter'=>'almofada para carimbo n° 03 azul, preta e vermelha.', 'description'=>'', 'food_unit_id'=>'1', 'food_type_id'=>'2', 'food_classification_id'=>'2']);
        Food::create(['title'=>'Apagador p/ quadr branc', 'filter'=>'apagador p/ quadr branc', 'description'=>'', 'food_unit_id'=>'1', 'food_type_id'=>'2', 'food_classification_id'=>'2']);
        Food::create(['title'=>'Apontador ', 'filter'=>'apontador ', 'description'=>'', 'food_unit_id'=>'1', 'food_type_id'=>'2', 'food_classification_id'=>'2']);
    }
}