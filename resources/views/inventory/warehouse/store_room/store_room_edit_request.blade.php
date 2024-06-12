<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Detalhe Solicitação"
            routeBack="{{route('store_rooms.requestShow',['store_room'=>$db->department_id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')

        <x-form.form method="edit" route="{{route('store_rooms.update',['store_room'=>$db->department_id,'request'=>$db->id])}}" btnHidden="TRUE">
            <div class="col-span-12">
                <x-accordion.accordion>
                    <x-accordion.accordionItem title="Dados da Solicitação">
                        @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_description_request')
                    </x-accordion.accordionItem>
                    <x-accordion.accordionItem title="Dados do Solicitante">
                        @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_description_user')
                    </x-accordion.accordionItem>
                    
                    @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_description_button_group')
                </x-accordion.accordion>
            </div>
        </x-form.form>

        <hr class="my-2">

        @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_button_group')
        @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_table')

    @endslot
</x-pages.index>