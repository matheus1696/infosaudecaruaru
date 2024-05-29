<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Lista de Ocupações (CBO)"/>
    @endslot

    <!-- Slot Body -->
    @slot('body')    
        @include('admin.company.occupations.partials.occupations_search')
        @include('admin.company.occupations.partials.occupations_table')
    @endslot
</x-pages.index>