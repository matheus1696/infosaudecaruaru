<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Entrada Avulsa de Suprimento"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.warehouse.store_room.partials.entry.store_room_entry_form')
        </x-conteiner>
    @endslot
</x-pages.index>