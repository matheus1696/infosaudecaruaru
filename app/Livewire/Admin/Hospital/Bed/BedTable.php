<?php

namespace App\Livewire\Admin\Hospital\Bed;

use App\Models\Hospital\Bed\HospitalBed;
use Livewire\Component;

class BedTable extends Component
{
    public function render()
    {
        $dbBeds = HospitalBed::all();

        return view('livewire..admin.hospital.bed.bed-table', compact('dbBeds'));
    }
}
