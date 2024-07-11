<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="{{$dbWarehouse->title}}"
            routeJoker="{{route('warehouse.store_rooms.entryShow',['store_room'=>$dbWarehouse->id])}}" btnTitleJoker="Entrada Avulsa" iconJoker="fas fa-plus"
            routeBack="{{route('warehouse.store_rooms.index')}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.warehouse.store_room.partials.show.store_room_show_table')
    @endslot
</x-pages.index>