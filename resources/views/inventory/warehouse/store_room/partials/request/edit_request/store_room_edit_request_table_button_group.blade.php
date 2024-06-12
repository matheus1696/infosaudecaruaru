@if ($db->status == 'Aberto')
    @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_table_button_edit_item')
    @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_table_button_destroy_item')
@else
    @if ($dbRequestDetail->confirmed)
        <div class="bg-green-600 text-white text-xs font-semibold">Liberado para Entrega</div>
    @else                        
        <div class="bg-red-600 text-white text-xs font-semibold">Sem estoque no momento</div>
    @endif
@endif