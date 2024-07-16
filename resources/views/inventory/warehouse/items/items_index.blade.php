<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Almoxarifado de Suprimentos"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.warehouse.items.partials.index.items_index_table')
    @endslot
</x-pages.index>