<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitação Nº: {{$db->code}}"
            routeBack="{{route('store_rooms.requestShow',['store_room'=>$db->department_id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.warehouse.center.partials.request.edit.center_request_description')
        </x-conteiner>
        @include('inventory.warehouse.center.partials.request.edit.center_request_table')
    @endslot
</x-pages.index>