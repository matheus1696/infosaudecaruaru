@if ($errors->any())
    <div class="relative px-4 py-3 mb-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
        <span class="block sm:inline">Ops! encontramos um erro ao enviar o formulário. Você poderia, por gentileza, revisar os campos?</span>
        <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<x-table.table :db="$db">
    @slot('thead')
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-32">Bloco Fin.</x-table.th>
        <x-table.th class="w-32">Quantidade</x-table.th>
        <x-table.th class="w-28"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$item->Consumable->title}}</x-table.td>
                <x-table.td>{{$item->CompanyFinancialBlock->acronym}}</x-table.td>
                <x-table.td>{{$item->quantity}}</x-table.td>
                <x-table.td>
                    <x-button.minButtonModalInfo id="Modal_Consumables_{{$item->id}}" title="Saída Avulsa de {{$item->Consumable->title}}" icon="fas fa-long-arrow-alt-down rotate-45" color="red" btnTitle="Saída">
                        <x-table.table>
                            @slot('thead')
                                <x-table.th>Nota Fiscal</x-table.th>
                                <x-table.th class="w-32">Fornecedor</x-table.th>
                                <x-table.th class="w-32">Bloco Fin.</x-table.th>
                                <x-table.th class="w-32">Quantidade</x-table.th>
                                <x-table.th class="w-28"></x-table.th>
                            @endslot
                        
                            @slot('tbody')
                                @foreach ($dbEntries as $dbEntry)
                                    @if ($dbEntry->financial_block_id === $item->financial_block_id)                                        
                                        <x-table.tr>
                                            <x-table.td>{{$dbEntry->invoice}}</x-table.td>
                                            <x-table.td>{{$dbEntry->supply_company}}</x-table.td>
                                            <x-table.td>{{$dbEntry->financial_block_id}}</x-table.td>
                                            <x-table.td>{{$dbEntry->quantity}}</x-table.td>
                                            <x-table.td>
                                                <x-button.minButtonModalInfo id="Modal_Entries_{{$dbEntry->id}}_{{$dbEntry->invoice}}" title="Informar Saída de {{$dbEntry->Consumable->title}}" icon="fas fa-long-arrow-alt-down rotate-45" color="red" btnTitle="Saída">
                                                    <x-form.form method="edit" route="{{route('warehouse_centers.exitStore',['warehouse_center'=>$dbEntry->id])}}" title="Confirmar Saída" color="red">
                                                        <x-form.select col="12" label="Almoxarifado Recebedor" id="incoming_department_id_{{$dbEntry->id}}_{{$dbEntry->invoice}}" name="incoming_department_id">
                                                            @foreach ($dbStoreRooms as $dbStoreRoom)
                                                                <option value="{{$dbStoreRoom->id}}">
                                                                    {{$dbStoreRoom->CompanyEstablishment->title}} - {{$dbStoreRoom->department}}
                                                                </option>
                                                            @endforeach
                                                        </x-form.select>
                                                        <x-form.input col="9" label="Suprimento" name="consumable_id" value="{{$dbEntry->Consumable->title}}" disabled="disabled"/>
                                                        <x-form.input col="3" type="number" label="Quantidade" id="quantity" name="quantity" min="1" max="{{$dbEntry->quantity}}"/>
                                                    </x-form.form>
                                                </x-button.minButtonModalInfo>
                                            </x-table.td>
                                        </x-table.tr>
                                    @endif
                                @endforeach
                            @endslot
                        </x-table.table>
                    </x-button.minButtonModalInfo>
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>