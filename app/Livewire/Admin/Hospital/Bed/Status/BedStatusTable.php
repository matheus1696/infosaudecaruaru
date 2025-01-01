<?php

namespace App\Livewire\Admin\Hospital\Bed\Status;

use App\Models\Hospital\Bed\HospitalBedStatus;
use Livewire\Component;

class BedStatusTable extends Component
{
    public function render()
    {        
        $dbBedStatuses = HospitalBedStatus::orderBy('title')->get();

        return view('livewire..admin.hospital.bed.status.bed-status-table', compact('dbBedStatuses'));
    }
}
