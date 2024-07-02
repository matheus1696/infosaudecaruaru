<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Estoque de Alimentos"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.foodstuff.store_room.partials.index.store_room_index_table')
    @endslot
</x-pages.index>