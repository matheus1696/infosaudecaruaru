<?php

namespace App\Livewire\Dashboard;

use App\Models\Company\CompanyEstablishment;
use App\Models\Shifts\ShiftMedical;
use Livewire\Component;

class DashboardShiftMedicals extends Component
{
    public $dateUpdated;

    public function render()
    {
        
        $this->dateUpdated = now()->format('d/m/Y H:i:s');

        //Listagem de Estabelecimentos
        $dbShiftMedicals = ShiftMedical::where('end_date','>',$this->dateUpdated)
            ->where('start_date','<',$this->dateUpdated)
            ->orderBy('establishment_id')
            ->orderBy('doctor_id')
            ->get();

        //Listagem de Estabelecimentos
        $dbEstablishments = CompanyEstablishment::query()
            ->where(function ($query) {
                $query->where('filter', 'like', '%upa vassoural%')
                    ->orWhere('filter', 'like', '%upa rendeiras%')
                    ->orWhere('filter', 'like', '%upa do salgado%')
                    ->orWhere('filter', 'like', '%upa boa vista%');
            })
            ->orderBy('title')
            ->get();
        
        return view('livewire.dashboard.dashboard-shift-medicals', compact('dbShiftMedicals','dbEstablishments'));
    }
}
