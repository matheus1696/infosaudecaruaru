<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Entrada de Suprimento"
            routeBack="{{route('inventory_store_room_items.show',['inventory_store_room_item'=>$dbStoreRoom->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.store_room.partials.entry.store_room_entry_form')
        </x-conteiner>
        <hr>
        @include('inventory.store_room.partials.entry.store_room_entry_table')
    @endslot
</x-pages.index>