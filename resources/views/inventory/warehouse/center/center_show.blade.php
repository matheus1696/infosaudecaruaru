<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="{{$dbDepartment->department}} - {{$dbDepartment->CompanyEstablishment->title}}"
            routeJoker="{{route('warehouse.centers.requestShow',['center'=>$dbDepartment->id])}}" iconJoker="fas fa-list" btnTitleJoker="Atender Solicitações"
            routeCreate="{{route('warehouse.centers.entryShow',['center'=>$dbDepartment->id])}}" btnTitleCreate="Entrada"
            routeBack="{{route('warehouse.centers.index')}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.warehouse.center.partials.show.center_show_table')
    @endslot
</x-pages.index>