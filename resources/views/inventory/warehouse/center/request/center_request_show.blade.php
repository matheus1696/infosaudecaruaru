<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitações de Suprimentos"
            routeBack="{{route('warehouse_centers.show',['warehouse_center'=>$dbDepartment->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <div class="grid grid-cols-1 gap-3 md:grid-cols-1">
            <div>
                <h3 class="mt-3 mb-2 text-lg text-center">Solicitações</h3>
                @include('inventory.warehouse.center.partials.request.show.center_request_show_table_request')
            </div>
            <div>
                <h3 class="mt-3 mb-2 text-lg text-center">Encaminhado para Entrega</h3>
                @include('inventory.warehouse.center.partials.request.show.center_request_show_table_send')
            </div>
        </div>
    @endslot
</x-pages.index>