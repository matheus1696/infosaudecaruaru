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
        @include('inventory.warehouse.center.partials.request.show_request.center_show_request_table_group')
    @endslot
</x-pages.index>