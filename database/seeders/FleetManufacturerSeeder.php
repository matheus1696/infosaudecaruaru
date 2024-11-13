<?php

namespace Database\Seeders;

use App\Models\Fleet\FleetManufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FleetManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $manufacturers = [
            'Volkswagen',
            'Fiat',
            'Chevrolet',
            'Ford',
            'Honda',
            'Toyota',
            'Renault',
            'Nissan',
            'Hyundai',
            'Peugeot',
            'Citroën',
            'Jeep',
            'Mitsubishi',
            'Chery',
            'BMW',
            'Mercedes-Benz',
            'Audi',
            'Kia',
            'Land Rover',
            'Lexus',
            'Subaru',
            'Porsche',
            'FCA (Stellantis)',
            'Volvo',
            'Mazda',
            'Troller',
            'Dongfeng',
            'Haval',
            'BYD',
            'JAC Motors',
            'Peugeot',
            'Dodge',
            'GWM (Great Wall Motors)',
        ];

        foreach ($manufacturers as $manufacturer) {
            FleetManufacturer::create([
                'manufacturer'=>$manufacturer
            ]);
        }
    }
}
