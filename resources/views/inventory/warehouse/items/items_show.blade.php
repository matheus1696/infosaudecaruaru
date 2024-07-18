<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        @if ($dbWarehouse->CompanyEstablishmentWarehouseType->type == "center")
            <x-header
                title="{{$dbWarehouse->title}}"
                routeCreate="{{route('warehouses.entryShow',['warehouse'=>$dbWarehouse->id])}}" btnTitleCreate="Entrada"
                routeBack="{{route('warehouses.index')}}"
            />
        @endif

        @if ($dbWarehouse->CompanyEstablishmentWarehouseType->type == "store_room")
            <x-header
                title="{{$dbWarehouse->title}}"
                routeJoker="{{route('warehouses.entryShow',['warehouse'=>$dbWarehouse->id])}}" iconJoker="fas fa-plus" btnTitleJoker="Entrada Avulsa"
                routeBack="{{route('warehouses.index')}}"
            />
        @endif
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.warehouse.items.partials.show.items_show_table')
    @endslot
</x-pages.index>