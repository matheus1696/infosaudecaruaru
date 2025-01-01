<?php

namespace Database\Seeders;

use App\Models\Hospital\Bed\HospitalBedStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalBedStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        HospitalBedStatus::create(['title'=>'Ocupado']);
        HospitalBedStatus::create(['title'=>'Livre']);
        HospitalBedStatus::create(['title'=>'Manutenção']);
    }
}
