<!-- Inicio de Componentização Page Index -->
<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Alterar dados Médicos"
            routeBack="{{route('professional_doctors.show',['professional_doctor'=>$dbDoctors->id])}}"
        />
    @endslot

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <form action="{{route('professional_doctors.update',['professional_doctor'=>$dbDoctors->id])}}" method="post">
                @csrf @method('PUT')
                <livewire:admin.professional.doctors.doctors-form :dbDoctors='$dbDoctors->id' />

                <x-button.btn-secondary value="Salvar Alterações"/>
            </form>
        </x-conteiner>
    @endslot
</x-pages.index>