<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="{{$dbDepartment->department}} - {{$dbDepartment->CompanyEstablishment->title}}"
            routeJoker="{{route('warehouse_centers.requestShow',['warehouse_center'=>$dbDepartment->id])}}" iconJoker="fas fa-list" btnTitleJoker="Atender Solicitações"
            routeCreate="{{route('warehouse_centers.entryShow',['warehouse_center'=>$dbDepartment->id])}}" btnTitleCreate="Entrada"
            routeBack="{{route('warehouse_centers.index')}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.warehouse.center.partials.show.center_show_table')
    @endslot
</x-pages.index>