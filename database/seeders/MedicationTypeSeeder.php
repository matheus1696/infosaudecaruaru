<?php

namespace Database\Seeders;

use App\Models\Medication\MedicationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        MedicationType::create(['title'=>'Oral', 'filter'=>'oral' ]);
        MedicationType::create(['title'=>'Ingetável', 'filter'=>'ingetável' ]);
    }
}
