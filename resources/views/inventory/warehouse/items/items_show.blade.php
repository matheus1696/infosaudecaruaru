<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="{{$dbWarehouse->title}}"
            routeCreate="{{route('warehouses.entryShow',['warehouse'=>$dbWarehouse->id])}}" btnTitleCreate="Entrada"
            routeBack="{{route('warehouses.index')}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.warehouse.items.partials.show.items_show_table')
    @endslot
</x-pages.index>