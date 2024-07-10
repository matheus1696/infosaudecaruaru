<div class="flex flex-col items-center justify-end col-span-12 gap-1 mb-2 md:flex-row">
    <h3 class="flex-1 col-span-12 px-3 text-lg font-semibold">Lista de Itens Solicitados</h3>
    @if ($db->status_id == "1")
        <div class="flex items-center gap-2">                    
            @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_button_create_item')
            @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_button_destroy_all_item')
            @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_button_cancellation')
        </div>
    @endif
</div>