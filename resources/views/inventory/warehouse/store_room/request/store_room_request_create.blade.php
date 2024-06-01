<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitações Nº (O NUMERO AQUI)"
            routeBack="{{route('store_rooms.show',['store_room'=>$dbDepartment->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.warehouse.store_room.partials.request.form.store_room_request_form')
        </x-conteiner>
    @endslot
</x-pages.index>