<?php

namespace Database\Seeders;

use App\Models\Medication\MedicationClassification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicationClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 
        MedicationClassification::create(['title'=>'Antibióticos', 'filter'=>'antibióticos']);
        MedicationClassification::create(['title'=>'Antimicóticos', 'filter'=>'antimicíticos']);
        MedicationClassification::create(['title'=>'Antivirais', 'filter'=>'antivirais']);
        MedicationClassification::create(['title'=>'Antiparasitários', 'filter'=>'antiparasitários']);
        MedicationClassification::create(['title'=>'Sulfonamidas', 'filter'=>'sulfonamidas']);
        MedicationClassification::create(['title'=>'Anti-histamínicos', 'filter'=>'anti-histamínicos']);
        MedicationClassification::create(['title'=>'Expectorantes', 'filter'=>'espectorantes']);
    }
}
