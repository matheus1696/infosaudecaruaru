<x-pages.index>
    <!-- Slot Header -->
    @slot('header')

        @if ($db->status_id === 1)        
            <x-header
                title="Detalhe Solicitação ({{$db->InventoryWarehouseRequestStatus->title}})"
                routeCreate="{{route('warehouse.store_rooms.confirmedRequest',['store_room'=>$db->department_id,'request'=>$db->id])}}" btnTitleCreate="Enviar Solicitação"
                routeBack="{{route('warehouse.store_rooms.showRequest',['store_room'=>$db->department_id])}}"
            />            
        @else
            <x-header
                title="Detalhe Solicitação ({{$db->InventoryWarehouseRequestStatus->title}})"
                routeBack="{{route('warehouse.store_rooms.showRequest',['store_room'=>$db->department_id])}}"
            />
        @endif
    @endslot
        
    <!-- Slot Body -->
    @slot('body')

        <x-form.form method="edit" route="{{route('warehouse.store_rooms.update',['store_room'=>$db->department_id,'request'=>$db->id])}}" btnHidden="TRUE">
            <div class="col-span-12">
                <x-accordion.accordion>
                    <x-accordion.accordionItem title="Dados da Solicitação">
                        @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_description_request')
                    
                        @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_description_button_update')
                    </x-accordion.accordionItem>
                    <x-accordion.accordionItem title="Dados do Solicitante">
                        @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_description_user')
                    
                        @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_description_button_update')
                    </x-accordion.accordionItem>
                </x-accordion.accordion>
            </div>
        </x-form.form>

        <hr class="my-4">

        @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_button_group')
        
        @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_table')

    @endslot
</x-pages.index>