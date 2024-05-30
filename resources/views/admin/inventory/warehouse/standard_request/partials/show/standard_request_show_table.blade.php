<x-table.table :db="$dbStandardRequestLists">
    @slot('thead')
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-40">Q. Padrão</x-table.th>
        <x-table.th class="w-28">Ações</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbStandardRequestLists as $dbStandardRequestList)
            <x-table.tr>
                <x-table.td>{{$dbStandardRequestList->Consumable->title}}</x-table.td>
                <x-table.td>{{$dbStandardRequestList->quantity}}</x-table.td>
                <x-table.td>
                    <x-button.minButtonModalEdit id="UserModal_{{$dbStandardRequestList->id}}" title="Alteração Informações do Suprimento">
                        <x-form.form method="edit" route="{{route('standard_request_lists.update',['standard_request_list'=>$dbStandardRequestList->id])}}">
                            <input hidden name="standard_request_id" value="{{$db->id}}">
                            <x-form.input col="10" label="Suprimento" name="consumable_id" value="{{$dbStandardRequestList->Consumable->title}}" disabled="disabled"/>
                            <x-form.input col="2" type="number" label="Quantidade" id="quantity" name="quantity" value="{{$dbStandardRequestList->quantity}}" />
                        </x-form.form>
                    </x-button.minButtonModalEdit>
                    <x-button.minButtonDelete route="{{route('standard_request_lists.destroy',['standard_request_list'=>$dbStandardRequestList->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>