<?php

namespace App\Livewire\Admin\Users;

use App\Models\Company\CompanyEstablishment;
use App\Models\Company\CompanyOccupation;
use App\Models\Company\CompanyOrganization;
use App\Models\User;
use App\Models\User\UserHasPermissions;
use App\Models\User\UserPermissions;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';
    public $perPage = 10;

    public function updatedSearch(){
        $this->resetPage();
    }

    public function render()
    {
        // Inicia a consulta de usuários
        $query = User::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
            $query->orWhere('email', 'like', '%' . strtolower($this->search) . '%');
        }

        // Paginando os resultados
        $dbUsers = $query->orderBy('name')->paginate($this->perPage);
        $dbPermissions = UserPermissions::all();
        $dbHasPermissions = UserHasPermissions::all();
        $dbCompanyOrganizational = CompanyOrganization::where('status', true)->orderBy('order')->get();
        $dbCompanyOccupations = CompanyOccupation::where('status', true)->orderBy('title')->get();
        $dbEstablishments = CompanyEstablishment::where('status', true)->orderBy('title')->get();

        return view('livewire.admin.users.users-table', [
            'dbUsers' => $dbUsers,
            'dbPermissions' => $dbPermissions,
            'dbHasPermissions' => $dbHasPermissions,
            'dbCompanyOrganizational' => $dbCompanyOrganizational,
            'dbCompanyOccupations' => $dbCompanyOccupations,
            'dbEstablishments' => $dbEstablishments,
        ]);
    }
}
