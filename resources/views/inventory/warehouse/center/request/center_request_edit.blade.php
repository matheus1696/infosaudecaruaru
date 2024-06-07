<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitação Nº: {{$db->code}}"
            routeCreate="{{route('warehouse_centers.requestConfirmed',['request'=>$db->department_id])}}" btnTitleCreate="Confirmar Pedido"
            routeBack="{{route('warehouse_centers.requestShow',['warehouse_center'=>$db->department_id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.warehouse.center.partials.request.edit.center_request_description')
        </x-conteiner>
        @include('inventory.warehouse.center.partials.request.edit.center_request_table')
    @endslot
</x-pages.index>