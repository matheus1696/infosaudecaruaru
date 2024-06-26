<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Almoxarifado Central"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.warehouse.center.partials.index.center_index_table')
    @endslot
</x-pages.index>