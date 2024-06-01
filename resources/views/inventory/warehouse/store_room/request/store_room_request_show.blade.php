<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitações de Suprimentos"
            routeCreate="{{route('store_rooms.requestCreate',['store_room'=>$db->id])}}" btnTitleCreate="Abertura de Solicitação"
            routeJoker="{{route('store_rooms.entryShow',['store_room'=>$db->id])}}" btnTitleJoker="Entrada Avulsa" iconJoker="fas fa-plus"
            routeBack="{{route('store_rooms.show',['store_room'=>$db->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
                <h3 class="text-center text-lg mt-3 mb-2">Solicitações</h3>
                @include('inventory.warehouse.store_room.partials.request.show.store_room_request_show_table_request')
            </div>
            <div>
                <h3 class="text-center text-lg mt-3 mb-2">Encaminhado para Entrega</h3>
                @include('inventory.warehouse.store_room.partials.request.show.store_room_request_show_table_send')
            </div>
        </div>
    @endslot
</x-pages.index>