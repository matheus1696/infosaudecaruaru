<?php

namespace App\Livewire\Admin\Hospital;

use App\Models\Hospital\HospitalRoomClassification;
use Livewire\Component;

class RoomClassificationTable extends Component
{
    public function render()
    {
        $dbRoomClassifications = HospitalRoomClassification::orderBy('title')->get();

        return view('livewire..admin.hospital.room-classification-table', compact('dbRoomClassifications'));
    }
}
