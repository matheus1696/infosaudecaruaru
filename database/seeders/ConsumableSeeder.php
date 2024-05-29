<?php

namespace Database\Seeders;

use App\Models\Consumable\Consumable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsumableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Consumable::create(['title'=>'Papel A4', 'filter'=>'papel a4', 'description'=>'', 'consumable_unit_id'=>'7', 'consumable_type_id'=>'1', 'consumable_classification_id'=>'2']);
        Consumable::create(['title'=>'Papel Higiênico', 'filter'=>'papel higiênico', 'description'=>'', 'consumable_unit_id'=>'2', 'consumable_type_id'=>'1', 'consumable_classification_id'=>'2']);
        Consumable::create(['title'=>'Detergente', 'filter'=>'detergente', 'description'=>'', 'consumable_unit_id'=>'1', 'consumable_type_id'=>'2', 'consumable_classification_id'=>'2']);
    }
}
