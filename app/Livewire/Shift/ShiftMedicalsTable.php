<?php

namespace App\Livewire\Shift;

use App\Models\Company\CompanyEstablishment;
use App\Models\Professional\ProfessionalDoctor;
use App\Models\Shifts\ShiftMedical;
use Carbon\Carbon;
use Livewire\Component;

class ShiftMedicalsTable extends Component
{
    public $searchEstablishment;
    public $searchDate = '';

    public function mount()
    {
        $this->searchDate = now()->format('Y-m-d');
    }

    public function goToPreviousDate()
    {
        $this->searchDate = Carbon::parse($this->searchDate)->subDay()->format('Y-m-d');
    }

    public function goToNextDate()
    {
        $this->searchDate = Carbon::parse($this->searchDate)->addDay()->format('Y-m-d');
    }

    public function render()
    {
        // Listagem de Estabelecimentos
        $filters = ['upa vassoural', 'upa rendeiras', 'upa do salgado', 'upa boa vista'];
        $dbEstablishments = CompanyEstablishment::query()
            ->where(function ($query) use ($filters) {
                foreach ($filters as $filter) {
                    $query->orWhere('filter', 'like', '%' . strtolower($filter) . '%');
                }
            })
            ->orderBy('title')
            ->get();

        // Listagem de Plantonistas
        $queryShift = ShiftMedical::query();

        // Filtro por Data
        if (!empty($this->searchDate)) {
            $queryShift->where(function ($query) {
                $query->whereDate('start_date', $this->searchDate)
                      ->orWhereDate('end_date', $this->searchDate);
            });
        }

        // Filtro por Estabelecimento
        if (!empty($this->searchEstablishment) && is_numeric($this->searchEstablishment)) {
            $queryShift->where('establishment_id', $this->searchEstablishment);
        }

        // Ordenação
        $dbShiftMedicals = $queryShift->orderBy('start_date')
            ->orderBy('start_time')
            ->orderBy('end_date')
            ->orderBy('end_time')
            ->get();

        //Listagem de Médicos
        $dbDoctors = ProfessionalDoctor::all();

        return view('livewire.shift.shift-medicals-table', compact('dbShiftMedicals', 'dbEstablishments','dbDoctors'));
    }
}
