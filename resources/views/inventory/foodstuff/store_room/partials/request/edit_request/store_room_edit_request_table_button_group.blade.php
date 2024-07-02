@if ($db->status == 'Aberto')
    <x-table.td>
        @include('inventory.foodstuff.store_room.partials.request.edit_request.store_room_edit_request_table_button_edit_item')@include('inventory.foodstuff.store_room.partials.request.edit_request.store_room_edit_request_table_button_destroy_item')
    </x-table.td>
@else
    @if ($dbRequestDetail->confirmed)
        <x-table.td class="text-xs font-semibold text-white bg-green-600">Liberado para Entrega</x-table.td>
    @else                        
        <x-table.td class="text-xs font-semibold text-white bg-red-600">Sem estoque no momento</x-table.td>
    @endif
@endif