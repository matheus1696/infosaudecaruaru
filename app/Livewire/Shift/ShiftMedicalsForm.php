<?php

namespace App\Livewire\Shift;

use App\Models\Company\CompanyEstablishment;
use App\Models\Professional\ProfessionalDoctor;
use App\Models\Shifts\ShiftMedical;
use Livewire\Component;

class ShiftMedicalsForm extends Component
{
    public $dbShiftMedical;

    public function render()
    {
        //Listagem de Dados
        $db = NULL; 

        // Aplica as informações do estabelecimento caso existam.
        if ($this->dbShiftMedical != NULL) {
            $db = ShiftMedical::find($this->dbShiftMedical);
        }

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

        //Listagem de Profissionais Médicos
        $dbDoctors = ProfessionalDoctor::where('status',TRUE)->orderBy('name')->get();
        
        return view('livewire.shift.shift-medicals-form', compact('db','dbEstablishments', 'dbDoctors'));
    }
}
