<?php

namespace App\Livewire\Admin\Professional\Doctors;

use App\Models\Professional\ProfessionalDoctor;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class DoctorsTable extends Component
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
        $query = ProfessionalDoctor::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->orWhere('crm', 'like', '%' . strtolower($this->search) . '%');
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        // Paginando os resultados
        $dbDoctors = $query->orderBy('name')->paginate($this->perPage);

        
        return view('livewire..admin.professional.doctors.doctors-table',compact('dbDoctors'));
    }
}
