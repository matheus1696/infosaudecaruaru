<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Tipo de Estabelecimento"
            routeCreate="{{ route('type_establishments.create') }}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('admin.company.type_establishments.partials.type_establishments_table')
    @endslot
</x-pages.index>
