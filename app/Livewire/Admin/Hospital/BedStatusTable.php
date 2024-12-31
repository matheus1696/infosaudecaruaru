<?php

namespace App\Livewire\Admin\Hospital;

use App\Models\Hospital\HospitalBedStatus;
use Livewire\Component;

class BedStatusTable extends Component
{
    public function render()
    {
        $dbBedStatuses = HospitalBedStatus::orderBy('title')->get();

        return view('livewire..admin.hospital.bed-status-table', compact('dbBedStatuses'));
    }
}
