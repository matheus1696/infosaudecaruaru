<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitação Nº: {{$db->code}}"
            routeBack="{{route('warehouse_centers.requestShow',['warehouse_center'=>$dbDepartment->id])}}"
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