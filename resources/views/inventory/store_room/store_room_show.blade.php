<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="{{$dbStoreRoom->title}}"
            routeJoker="{{route('inventory_store_room_items.entryShow',['inventory_store_room_item'=>$dbStoreRoom->id])}}" iconJoker="fas fa-plus" btnTitleJoker="Entrada Avulsa"
            routeBack="{{route('inventory_store_room_items.index')}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.store_room.partials.show.store_room_show_table')
    @endslot
</x-pages.index>