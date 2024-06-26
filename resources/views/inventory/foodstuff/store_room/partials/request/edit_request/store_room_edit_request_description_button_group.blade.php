<!-- Atualizar dados -->
@if ($db->status == "Aberto")
<div class="flex flex-row items-center justify-end col-span-12 gap-3 px-1">
    @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_description_button_update')
    @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_description_button_destroy')
</div>
@endif