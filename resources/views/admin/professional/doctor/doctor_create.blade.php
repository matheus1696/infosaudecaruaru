<!-- Inicio de Componentização Page Index -->
<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Cadastrar Dados Médicos"
            routeBack="{{route('professional_doctors.index')}}"
        />
    @endslot

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <form action="{{route('professional_doctors.store')}}" method="post">
                @csrf
                <livewire:admin.professional.doctors.doctors-form />

                <x-button.btn-primary />
            </form>
        </x-conteiner>
    @endslot
</x-pages.index>
