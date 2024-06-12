<x-table.table :db="$dbRequestDetails">
    @slot('thead')
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-32">Estoque Atual</x-table.th>
        <x-table.th class="w-32">Qtd. Padrão</x-table.th>
        <x-table.th class="w-32">Qtd. Solicitada</x-table.th>
        <x-table.th class="w-48"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestDetails as $dbRequestDetail)
            <x-table.tr>
                <x-table.td>{{$dbRequestDetail->Consumable->title}}</x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity_current}}</x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity_default}}</x-table.td>
                <x-table.td class="bg-yellow-100">{{$dbRequestDetail->quantity}}</x-table.td>
                <x-table.td>
                    @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_table_button_group')
                </x-table.td>

            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>