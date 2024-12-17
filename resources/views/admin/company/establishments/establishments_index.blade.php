<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Lista de Estabelecimento" routeCreate="{{route('establishments.create')}}"/>
    @endslot
    
    <!-- Slot Body -->
    @slot('body')
        <livewire:admin.company.establishments.establishments-table />
    @endslot
    
</x-pages.index>