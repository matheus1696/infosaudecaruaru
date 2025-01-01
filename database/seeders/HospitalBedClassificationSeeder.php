<?php

namespace Database\Seeders;

use App\Models\Hospital\Bed\HospitalBedClassification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalBedClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        HospitalBedClassification::create(['title'=>'Sala Vermelha']);
        HospitalBedClassification::create(['title'=>'Sala Amarela']);
        HospitalBedClassification::create(['title'=>'Internação']);
    }
}
