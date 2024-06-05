<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitações de Suprimentos"
            routeCreate="{{route('store_rooms.requestCreate',['store_room'=>$dbDepartment->id])}}" btnTitleCreate="Abertura de Solicitação"
            routeJoker="{{route('store_rooms.entryShow',['store_room'=>$dbDepartment->id])}}" btnTitleJoker="Entrada Avulsa" iconJoker="fas fa-plus"
            routeBack="{{route('store_rooms.show',['store_room'=>$dbDepartment->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
            <div>
                <h3 class="mt-3 mb-2 text-lg text-center">Solicitações</h3>
                @include('inventory.warehouse.store_room.partials.request.show.store_room_request_show_table_request')
            </div>
            <div>
                <h3 class="mt-3 mb-2 text-lg text-center">Encaminhado para Entrega</h3>
                @include('inventory.warehouse.store_room.partials.request.show.store_room_request_show_table_send')
            </div>
        </div>
    @endslot
</x-pages.index>