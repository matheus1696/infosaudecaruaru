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

    public function mount($dbEstablishment = null)
    {
        $this->dbEstablishment = $dbEstablishment;

        // Inicializa os valores do estado e cidade com base no banco, se aplicável
        if ($this->dbEstablishment) {
            $db = CompanyEstablishment::find($this->dbEstablishment);
            if ($db) {
                $this->selectedState = $db->state_id;
                $this->selectedCity = $db->city_id;
            }
        }
    }

    public function updating()
    {
        $this->selectedCity = 0;
    }

    public function render()
    {
        // Obtém as cidades relacionadas ao estado selecionado
        $dbRegionCities = [];
        if (!empty($this->selectedState)) {
            $dbRegionCities = RegionCity::where('state_id', $this->selectedState)->orderBy('city')->get();
        }

        // Obtém os outros dados necessários para a view
        $dbRegionStates = RegionState::where('status', true)->orderBy('state')->get();
        $dbCompanyTypeEstablishments = CompanyTypeEstablishment::where('status', true)->orderBy('title')->get();
        $dbCompanyFinancialBlocks = CompanyFinancialBlock::where('status', true)->orderBy('title')->get();

        return view('livewire.admin.company.establishments.establishments-form', compact(
            'dbRegionStates',
            'dbRegionCities',
            'dbCompanyTypeEstablishments',
            'dbCompanyFinancialBlocks'
        ));
    }
}
