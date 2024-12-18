<?php

namespace App\Livewire\Admin\Company\Establishments;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyFinancialBlock;
use App\Models\Company\CompanyTypeEstablishment;
use App\Models\Region\RegionCity;
use App\Models\Region\RegionState;
use Livewire\Component;

class EstablishmentsForm extends Component
{
    public $dbEstablishment;
    public $selectedState = 0;
    public $selectedCity = 0;

    public function mount(){
        // Aplica as informações do estabelecimento caso existam.
        if ($this->dbEstablishment != NULL) {
            $db = CompanyEstablishment::find($this->dbEstablishment);
            $this->selectedState = $db->state_id;
            $this->selectedCity = $db->city_id;
        }
    }

    public function updating()
    {
        $this->selectedCity = 0;
    }

    public function render()
    {
        //Listagem de Dados
        $db = NULL; 

        // Aplica as informações do estabelecimento caso existam.
        if ($this->dbEstablishment != NULL) {
            $db = CompanyEstablishment::find($this->dbEstablishment);
        }

        $dbRegionCities = [];

        // Aplica os filtros do estado selecionado.
        if (!empty($this->selectedState)) {
            $dbRegionCities = RegionCity::where('state_id', $this->selectedState)->orderBy('city')->get();
        }        

        $dbRegionStates = RegionState::where('status',true)->orderBy('state')->get();
        $dbCompanyTypeEstablishments = CompanyTypeEstablishment::where('status',true)->orderBy('title')->get();
        $dbCompanyFinancialBlocks = CompanyFinancialBlock::where('status',true)->orderBy('title')->get();

        return view('livewire..admin.company.establishments.establishments-form', compact('db', 'dbRegionStates', 'dbRegionCities', 'dbCompanyTypeEstablishments', 'dbCompanyFinancialBlocks'));
    }
}
