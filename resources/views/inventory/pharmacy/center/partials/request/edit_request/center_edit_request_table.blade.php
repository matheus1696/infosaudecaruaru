<x-table.table :db="$dbRequestDetails">
    @slot('thead')
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-32">Estoque</x-table.th>
        <x-table.th class="w-32">Est. Solicitante</x-table.th>
        <x-table.th class="w-32">Qtd. Solicitada</x-table.th>
        <x-table.th class="w-32">Qtd. Enviado</x-table.th>
        @if ($db->status == 'Aberto')
            <x-table.th class="w-32">Status</x-table.th>
            <x-table.th class="w-28"></x-table.th> 
        @else
            <x-table.th class="w-48"></x-table.th> 
        @endif
    @endslot

    @slot('tbody')
        @foreach ($dbRequestDetails as $dbRequestDetail)
            <x-table.tr>
                <x-table.td>{{$dbRequestDetail->Consumable->title}}</x-table.td>
                <x-table.td class="bg-sky-100">
                    @foreach ($dbWarehouseInventories as $dbWarehouseInventory)
                        @if ($dbWarehouseInventory->consumable_id == $dbRequestDetail->consumable_id)
                            @if ($dbWarehouseInventory->quantity > 0)
                                {{$dbWarehouseInventory->quantity}}
                            @else
                                0
                            @endif                                
                            @break
                        @endif
                    @endforeach
                </x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity_current}}</x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity}}</x-table.td>
                <x-table.td class="bg-yellow-100">{{$dbRequestDetail->quantity_forwarded}}</x-table.td>
                @include('inventory.warehouse.center.partials.request.edit_request.center_edit_request_table_button_group')
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>