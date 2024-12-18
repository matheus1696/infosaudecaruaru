<?php

namespace App\Livewire\Admin\Professional\Doctors;

use App\Models\Professional\ProfessionalDoctor;
use Livewire\Component;

class DoctorsForm extends Component
{
    public $dbDoctors;

    public function render()
    {
        $db = NULL;

        // Aplica as informações do estabelecimento caso existam.
        if ($this->dbDoctors != NULL) {
            $db = ProfessionalDoctor::find($this->dbDoctors);
        }

        return view('livewire..admin.professional.doctors.doctors-form', compact('db'));
    }
}
