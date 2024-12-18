<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Lista de Médicos" routeCreate="{{route('professional_doctors.create')}}"/>
    @endslot
    
    <!-- Slot Body -->
    @slot('body')
        <livewire:admin.professional.doctors.doctors-table />
    @endslot
    
</x-pages.index>