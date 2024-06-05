<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Entrada Avulsa de Suprimento"
            routeBack="{{route('warehouse_centers.requestShow',['warehouse_center'=>$db->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.warehouse.center.partials.entry.center_entry_form')
        </x-conteiner>
        <hr>
        @include('inventory.warehouse.center.partials.entry.center_entry_table')
    @endslot
</x-pages.index>