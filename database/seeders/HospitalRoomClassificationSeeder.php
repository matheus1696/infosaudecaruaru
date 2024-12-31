<?php

namespace Database\Seeders;

use App\Models\Hospital\HospitalRoomClassification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalRoomClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        HospitalRoomClassification::create(['title'=>'Sala Vermelha']);
        HospitalRoomClassification::create(['title'=>'Sala Amarela']);
        HospitalRoomClassification::create(['title'=>'Internação']);
    }
}
