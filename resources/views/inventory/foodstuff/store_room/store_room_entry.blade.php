<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Entrada Avulsa de Alimentos"
            routeBack="{{route('foodstuff.store_rooms.requestShow',['store_room'=>$db->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.foodstuff.store_room.partials.entry.store_room_entry_form')
        </x-conteiner>
        <hr>
        @include('inventory.foodstuff.store_room.partials.entry.store_room_entry_table')
    @endslot
</x-pages.index>