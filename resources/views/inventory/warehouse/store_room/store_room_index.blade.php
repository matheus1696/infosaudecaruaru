<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Almoxarifado"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.warehouse.store_room.partials.index.store_room_index_table')
    @endslot
</x-pages.index>