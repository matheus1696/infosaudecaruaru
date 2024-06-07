<div class="flex flex-col items-center justify-end col-span-12 gap-1 mb-2 md:flex-row">    
    <h3 class="flex-1 col-span-12 px-3 text-lg font-semibold">Lista de Itens Solicitados</h3>    
</div>

<x-table.table :db="$dbRequestDetails">
    @slot('thead')
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-32">Estoque Unidade</x-table.th>
        <x-table.th class="w-32">Qtd. Solicitada</x-table.th>
        <x-table.th class="w-32">Qtd. Envio</x-table.th>
        <x-table.th class="w-28"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestDetails as $dbRequestDetail)
            <x-table.tr>
                <x-table.td>{{$dbRequestDetail->Consumable->title}}</x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity_current}}</x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity}}</x-table.td>
                <x-table.td class="bg-yellow-100">{{$dbRequestDetail->quantity_forwarded}}</x-table.td>
                <x-table.td>
                    <x-button.minButtonModalEdit id="requestDetails_{{$dbRequestDetail->id}}" title="Alterar quantidade da solicitação do suprimento">
                        <x-form.form method="edit" route="{{route('warehouse_centers.requestUpdate',['request'=>$db->id])}}" title="Alterar Quantidade de Envio" color="sky">
                            <input hidden id="consumableEdit" name="consumableEdit" value="{{$dbRequestDetail->consumable_id}}">
                            <x-form.input col="9" label="Suprimentos" name="disabled" value="{{$dbRequestDetail->Consumable->title}}" disabled="disabled"/>
                            <x-form.input col="3" type="number" label="Quantidade" id="quantityEdit" name="quantityEdit" min="1" value="{{$dbRequestDetail->quantity_forwarded}}"/>
                        </x-form.form>
                    </x-button.minButtonModalEdit>
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>