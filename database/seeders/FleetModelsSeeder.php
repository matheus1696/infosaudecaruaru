<?php

namespace Database\Seeders;

use App\Models\Fleet\FleetModels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FleetModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        FleetModels::create([
            'manufacturer_id' => '1',
            'model' => 'Gol',
            'engine' => '1.0',
            'transmission' => 'Manual',
            'fuel_type' => 'Flex',
        ]);

        FleetModels::create([
            'manufacturer_id' => '1',
            'model' => 'Gol',
            'engine' => '1.6',
            'transmission' => 'Manual',
            'fuel_type' => 'Flex',
        ]);

        FleetModels::create([
            'manufacturer_id' => '1',
            'model' => 'Voyage',
            'engine' => '1.0',
            'transmission' => 'Manual',
            'fuel_type' => 'Flex',
        ]);

        FleetModels::create([
            'manufacturer_id' => '1',
            'model' => 'Voyage',
            'engine' => '1.6',
            'transmission' => 'Manual',
            'fuel_type' => 'Flex',
        ]);

        FleetModels::create([
            'manufacturer_id' => '2',
            'model' => 'Mobi',
            'engine' => '1.0',
            'transmission' => 'Manual',
            'fuel_type' => 'Flex',
        ]);

        FleetModels::create([
            'manufacturer_id' => '5',
            'model' => 'CG 160',
            'engine' => '160',
            'transmission' => 'Manual',
            'fuel_type' => 'Flex',
        ]);

        FleetModels::create([
            'manufacturer_id' => '5',
            'model' => 'CB 500',
            'engine' => '500',
            'transmission' => 'Manual',
            'fuel_type' => 'Flex',
        ]);

        FleetModels::create([
            'manufacturer_id' => '5',
            'model' => 'XRE 300',
            'engine' => '300',
            'transmission' => 'Manual',
            'fuel_type' => 'Flex',
        ]);
    }
}
