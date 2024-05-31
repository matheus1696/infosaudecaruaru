<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Almoxarifado: {{$dbDepartment->department}}"
            routeJoker="{{route('store_rooms.index')}}" btnTitleJoker="Entrada Avulsa" iconJoker="fas fa-plus"
            routeBack="{{route('store_rooms.index')}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.warehouse.store_room.partials.show.store_room_show_table')
    @endslot
</x-pages.index>