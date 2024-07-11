<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitações de Suprimentos"
            routeCreate="{{route('warehouse.store_rooms.createRequest',['store_room'=>$dbWarehouse->id])}}" btnTitleCreate="Abertura de Solicitação"
            routeBack="{{route('warehouse.store_rooms.show',['store_room'=>$dbWarehouse->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')          
        @include('inventory.warehouse.store_room.partials.request.show_request.store_room_show_request_table')
    @endslot
</x-pages.index>