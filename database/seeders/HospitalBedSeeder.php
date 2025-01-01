<?php

namespace Database\Seeders;

use App\Models\Hospital\Bed\HospitalBed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalBedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sala Vermelha (Unidade 92)
        HospitalBed::create(['code' => 'USSVL01', 'title' => 'Leito Sala Vermelha 01 - UPA Salgado', 'operational_status_id' => 1, 'classification_id' => 1, 'establishment_id' => 92]);
        HospitalBed::create(['code' => 'USSVL02', 'title' => 'Leito Sala Vermelha 02 - UPA Salgado', 'operational_status_id' => 2, 'classification_id' => 1, 'establishment_id' => 92]);

        // Sala Amarela (Unidade 92)
        HospitalBed::create(['code' => 'USSAL01', 'title' => 'Leito Sala Amarela 01 - UPA Salgado', 'operational_status_id' => 3, 'classification_id' => 2, 'establishment_id' => 92]);
        HospitalBed::create(['code' => 'USSAL02', 'title' => 'Leito Sala Amarela 02 - UPA Salgado', 'operational_status_id' => 2, 'classification_id' => 2, 'establishment_id' => 92]);
        HospitalBed::create(['code' => 'USSAL03', 'title' => 'Leito Sala Amarela 03 - UPA Salgado', 'operational_status_id' => 1, 'classification_id' => 2, 'establishment_id' => 92]);
        HospitalBed::create(['code' => 'USSAL04', 'title' => 'Leito Sala Amarela 04 - UPA Salgado', 'operational_status_id' => 1, 'classification_id' => 2, 'establishment_id' => 92]);

        // Sala Vermelha (Unidade 91)
        HospitalBed::create(['code' => 'UBSVL01', 'title' => 'Leito Sala Vermelha 01 - UPA Boa Vista', 'operational_status_id' => 3, 'classification_id' => 1, 'establishment_id' => 91]);
        HospitalBed::create(['code' => 'UBSVL02', 'title' => 'Leito Sala Vermelha 02 - UPA Boa Vista', 'operational_status_id' => 2, 'classification_id' => 1, 'establishment_id' => 91]);

        // Sala Amarela (Unidade 91)
        HospitalBed::create(['code' => 'UBSAL01', 'title' => 'Leito Sala Amarela 01 - UPA Boa Vista', 'operational_status_id' => 1, 'classification_id' => 2, 'establishment_id' => 91]);
        HospitalBed::create(['code' => 'UBSAL02', 'title' => 'Leito Sala Amarela 02 - UPA Boa Vista', 'operational_status_id' => 2, 'classification_id' => 2, 'establishment_id' => 91]);


    }
}
