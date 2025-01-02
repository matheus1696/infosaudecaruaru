<?php

namespace App\Livewire\Admin\Hospital\Bed;

use App\Models\Hospital\Bed\HospitalBed;
use Livewire\Component;

class BedTable extends Component
{
    public $search = '';

    public function render()
    {
        // Inicia a consulta de usuários
        $query = HospitalBed::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        $dbBeds = $query->orderBy('title')->get();

        return view('livewire..admin.hospital.bed.bed-table', compact('dbBeds'));
    }
}
