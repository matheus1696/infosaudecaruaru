<?php

namespace Database\Seeders;

use App\Models\Food\FoodUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        FoodUnit::create(['code'=>'KG', 'title'=>'Quilo', 'filter'=>'quilo' ]);
        FoodUnit::create(['code'=>'ML', 'title'=>'Miligrama', 'filter'=>'miligrama' ]);
    }
}
