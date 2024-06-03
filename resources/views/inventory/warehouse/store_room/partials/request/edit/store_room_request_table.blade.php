<x-table.table :db="$dbRequestDetails">
    @slot('thead')
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-32">Estoque Atual</x-table.th>
        <x-table.th class="w-32">Qtd. Solicitada</x-table.th>
        <x-table.th class="w-28"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestDetails as $dbRequestDetail)
            <x-table.tr>
                <x-table.td>{{$dbRequestDetail->Consumable->title}}</x-table.td>
                <x-table.td>
                    @foreach ($dbStoreRoomInventories as $dbStoreRoomInventory)
                        @if ($dbRequestDetail->consumable_id === $dbStoreRoomInventory->consumable_id)
                            {{$dbStoreRoomInventory->quantity}}
                        @endif
                    @endforeach
                </x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity}}</x-table.td>
                <x-table.td>
                    <x-button.minButtonModalEdit id="requestDetails_{{$dbRequestDetail->id}}" title="Alterar quantidade da solicitação do suprimento">
                        <x-form.form method="edit" route="{{route('store_rooms.requestUpdate',['request'=>$db->id])}}" title="Alterar Quantidade" color="sky">
                            <input hidden id="consumableEdit" name="consumableEdit" value="{{$dbRequestDetail->consumable_id}}">
                            <x-form.input col="9" label="Suprimentos" name="disabled" value="{{$dbRequestDetail->Consumable->title}}" disabled="disabled"/>
                            <x-form.input col="3" type="number" label="Quantidade" id="quantityEdit" name="quantityEdit" min="1" value="{{$dbRequestDetail->quantity}}"/>

                        </x-form.form>
                    </x-button.minButtonModalEdit>
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>