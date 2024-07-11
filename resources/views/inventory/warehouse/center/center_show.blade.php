<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="{{$dbWarehouse->CompanyEstablishment->title}}"
            routeCreate="{{route('warehouse.centers.entryShow',['center'=>$dbWarehouse->id])}}" btnTitleCreate="Entrada"
            routeBack="{{route('warehouse.centers.index')}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.warehouse.center.partials.show.center_show_table')
    @endslot
</x-pages.index>