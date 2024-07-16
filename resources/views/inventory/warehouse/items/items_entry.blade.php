<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Entrada de Suprimento"
            routeBack="{{route('warehouses.show',['warehouse'=>$db->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.warehouse.items.partials.entry.items_entry_form')
        </x-conteiner>
        <hr>
        @include('inventory.warehouse.items.partials.entry.items_entry_table')
    @endslot
</x-pages.index>