<?php

namespace App\Livewire\Admin\Hospital\Bed\Classification;

use App\Models\Hospital\Bed\HospitalBedClassification;
use Livewire\Component;

class BedClassificationTable extends Component
{
    public function render()
    {
        
        $dbBedClassifications = HospitalBedClassification::orderBy('title')->get();

        return view('livewire..admin.hospital.bed.classification.bed-classification-table', compact('dbBedClassifications'));
    }
}
