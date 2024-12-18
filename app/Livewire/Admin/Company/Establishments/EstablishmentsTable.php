<?php

namespace App\Livewire\Admin\Company\Establishments;

use App\Models\Company\CompanyEstablishment;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class EstablishmentsTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';
    public $perPage = 10;

    public function updating(){
        $this->resetPage();
    }

    public function render()
    {
        // Inicia a consulta de usuários
        $query = CompanyEstablishment::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->where('code', 'like', '%' . strtolower($this->search) . '%');
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        // Paginando os resultados
        $dbEstablishments = $query->orderBy('status','DESC')
            ->orderBy('title')
            ->with('FinancialBlock')
            ->with('TypeEstablishment')
            ->with('RegionCity')
            ->paginate($this->perPage);

        return view('livewire..admin.company.establishments.establishments-table', compact('dbEstablishments'));
    }
}
