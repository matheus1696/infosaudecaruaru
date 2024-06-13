<x-table.table :db="$dbRequestDetails">
    @slot('thead')
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-32">Estoque Atual</x-table.th>
        <x-table.th class="w-32">Qtd. Padrão</x-table.th>
        <x-table.th class="w-32">Qtd. Solicitada</x-table.th>
        @if ($db->status == "Encaminhado")
            <x-table.th class="w-32">Qtd. Enviada</x-table.th>
            <x-table.th class="w-40">Acusar Recebimento</x-table.th>
        @endif
        <x-table.th class="w-48"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestDetails as $dbRequestDetail)
            <x-table.tr>
                <x-table.td>{{$dbRequestDetail->Consumable->title}}</x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity_current}}</x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity_default}}</x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity}}</x-table.td>
                @if ($db->status == "Encaminhado")
                    <x-table.td class="font-semibold bg-sky-100">{{$dbRequestDetail->quantity_forwarded}}</x-table.td>
                        @if ($dbRequestDetail->confirmed)
                            @if ($dbRequestDetail->receipt)
                                <x-table.td class="text-xs font-semibold text-white bg-sky-600">Recebido</x-table.td>
                            @else
                                <x-table.td>
                                    <x-form.form method="edit" route="{{route('store_rooms.receiptItem',['store_room'=>$db->department_id,'request'=>$dbRequestDetail->id])}}" btnHidden="TRUE">
                                        <button type="submit" class="col-span-12 p-1 text-xs font-semibold text-white bg-green-600 rounded-lg shadow-lg hover:bg-green-700">Acusar Recebimento</button>
                                    </x-form.form>
                                </x-table.td>
                            @endif
                        @else
                            <x-table.td></x-table.td>                                
                        @endif
                @endif
                
                @include('inventory.warehouse.store_room.partials.request.edit_request.store_room_edit_request_table_button_group')
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>