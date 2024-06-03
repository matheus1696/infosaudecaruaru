<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitações Nº {{$db->code}}"
            routeBack="{{route('store_rooms.requestShow',['store_room'=>$db->department_id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.warehouse.store_room.partials.request.edit.store_room_request_description')
        </x-conteiner>
        <x-conteiner>
            @include('inventory.warehouse.store_room.partials.request.edit.store_room_request_form')
        </x-conteiner>
        @include('inventory.warehouse.store_room.partials.request.edit.store_room_request_table')
    @endslot
</x-pages.index>