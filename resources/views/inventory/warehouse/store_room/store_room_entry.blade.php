<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Entrada Avulsa de Suprimento"
            routeBack="{{route('warehouse.store_rooms.show',['store_room'=>$db->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.warehouse.store_room.partials.entry.store_room_entry_form')
        </x-conteiner>
        <hr>
        @include('inventory.warehouse.store_room.partials.entry.store_room_entry_table')
    @endslot
</x-pages.index>