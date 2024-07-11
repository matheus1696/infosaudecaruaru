<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Criando Solicitação"
            routeBack="{{route('warehouse.store_rooms.showRequest',['store_room'=>$dbWarehouse->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="create" route="{{route('warehouse.store_rooms.storeRequest')}}">
                @include('inventory.warehouse.store_room.partials.request.create_request.store_room_create_request_form')
            </x-form.form>
        </x-conteiner>
    @endslot
</x-pages.index>