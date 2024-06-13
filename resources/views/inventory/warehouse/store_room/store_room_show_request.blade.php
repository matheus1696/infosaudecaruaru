<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitações de Suprimentos"
            routeCreate="{{route('store_rooms.create',['store_room'=>$dbDepartment->id])}}" btnTitleCreate="Abertura de Solicitação"
            routeJoker="{{route('store_rooms.entryShow',['store_room'=>$dbDepartment->id])}}" btnTitleJoker="Entrada Avulsa" iconJoker="fas fa-plus"
            routeBack="{{route('store_rooms.show',['store_room'=>$dbDepartment->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')          
        @include('inventory.warehouse.store_room.partials.request.show_request.store_room_show_request_table_group')
    @endslot
</x-pages.index>