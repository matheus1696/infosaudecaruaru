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
        HospitalBed::create([
            'code' => 'USSVL01',
            'title' => 'UPA Salgado - Sala Vermelha Leito 01',
            'operational_status_id' => 1,
            'classification_id' => 1,
            'establishment_id' => 92,
            'filter' => strtolower('UPA Salgado - Sala Vermelha Leito 01')
        ]);

        HospitalBed::create([
            'code' => 'USSVL02',
            'title' => 'UPA Salgado - Sala Vermelha Leito 02',
            'operational_status_id' => 2,
            'classification_id' => 1,
            'establishment_id' => 92,
            'filter' => strtolower('UPA Salgado - Sala Vermelha Leito 02')
        ]);

        // Sala Amarela (Unidade 92)
        HospitalBed::create([
            'code' => 'USSAL01',
            'title' => 'UPA Salgado - Sala Amarela Leito 01',
            'operational_status_id' => 3,
            'classification_id' => 2,
            'establishment_id' => 92,
            'filter' => strtolower('UPA Salgado - Sala Amarela Leito 01')
        ]);

        HospitalBed::create([
            'code' => 'USSAL02',
            'title' => 'UPA Salgado - Sala Amarela Leito 02',
            'operational_status_id' => 2,
            'classification_id' => 2,
            'establishment_id' => 92,
            'filter' => strtolower('UPA Salgado - Sala Amarela Leito 02')
        ]);

        HospitalBed::create([
            'code' => 'USSAL03',
            'title' => 'UPA Salgado - Sala Amarela Leito 03',
            'operational_status_id' => 1,
            'classification_id' => 2,
            'establishment_id' => 92,
            'filter' => strtolower('UPA Salgado - Sala Amarela Leito 03')
        ]);

        HospitalBed::create([
            'code' => 'USSAL04',
            'title' => 'UPA Salgado - Sala Amarela Leito 04',
            'operational_status_id' => 1,
            'classification_id' => 2,
            'establishment_id' => 92,
            'filter' => strtolower('UPA Salgado - Sala Amarela Leito 04')
        ]);

        // Sala Vermelha (Unidade 91)
        HospitalBed::create([
            'code' => 'UBSVL01',
            'title' => 'UPA Boa Vista - Sala Vermelha Leito 01',
            'operational_status_id' => 3,
            'classification_id' => 1,
            'establishment_id' => 91,
            'filter' => strtolower('UPA Boa Vista - Sala Vermelha Leito 01')
        ]);

        HospitalBed::create([
            'code' => 'UBSVL02',
            'title' => 'UPA Boa Vista - Sala Vermelha Leito 02',
            'operational_status_id' => 2,
            'classification_id' => 1,
            'establishment_id' => 91,
            'filter' => strtolower('UPA Boa Vista - Sala Vermelha Leito 02')
        ]);

        // Sala Amarela (Unidade 91)
        HospitalBed::create([
            'code' => 'UBSAL01',
            'title' => 'UPA Boa Vista - Sala Amarela Leito 01',
            'operational_status_id' => 1,
            'classification_id' => 2,
            'establishment_id' => 91,
            'filter' => strtolower('UPA Boa Vista - Sala Amarela Leito 01')
        ]);

        HospitalBed::create([
            'code' => 'UBSAL02',
            'title' => 'UPA Boa Vista - Sala Amarela Leito 02',
            'operational_status_id' => 2,
            'classification_id' => 2,
            'establishment_id' => 91,
            'filter' => strtolower('UPA Boa Vista - Sala Amarela Leito 02')
        ]);
    }
}
