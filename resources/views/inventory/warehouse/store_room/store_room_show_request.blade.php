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
    <nav>
        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-requests-open-tab" data-toggle="tab" data-target="#nav-requests-open" type="button" role="tab" aria-controls="nav-requests-open" aria-selected="true">
                <span class="text-sm font-semibold">Solicitações Abertas</span>
            </button>
            <button class="nav-link" id="nav-requests-forwarded-delivery-tab" data-toggle="tab" data-target="#nav-requests-forwarded-delivery" type="button" role="tab" aria-controls="nav-requests-forwarded-delivery" aria-selected="false">
                <span class="text-sm font-semibold">Encaminhado para Entrega </span>
            </button>
            <button class="nav-link" id="nav-requests-canceled-tab" data-toggle="tab" data-target="#nav-requests-canceled" type="button" role="tab" aria-controls="nav-requests-canceled" aria-selected="false">
                <span class="text-sm font-semibold">Cancelados</span>
            </button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-requests-open" role="tabpanel" aria-labelledby="nav-requests-open-tab">           
            @include('inventory.warehouse.store_room.partials.request.show_request.store_room_show_request_table_open') 
        </div>
        <div class="tab-pane fade" id="nav-requests-forwarded-delivery" role="tabpanel" aria-labelledby="nav-requests-forwarded-delivery-tab">            
            @include('inventory.warehouse.store_room.partials.request.show_request.store_room_show_request_table_forwarded')
        </div>
        <div class="tab-pane fade" id="nav-requests-canceled" role="tabpanel" aria-labelledby="nav-requests-canceled-tab">           
            @include('inventory.warehouse.store_room.partials.request.show_request.store_room_show_request_table_canceled')
        </div>
    </div>
    @endslot
</x-pages.index>