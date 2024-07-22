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

    <x-table.table>
        @slot('thead')
            <x-table.th>Suprimentos</x-table.th>
            <x-table.th class="w-28">Quantidade</x-table.th>
            <x-table.th class="w-28"></x-table.th>
        @endslot

        @slot('tbody')
            @foreach ($dbItems as $dbItem)
                <x-table.tr>
                    <x-table.td>{{$dbItem->Consumable->title}}</x-table.td>
                    <x-table.td>{{$dbItem->quantity}}</x-table.td>
                    <x-table.td>
                        <x-button.minButtonModal id="Warehouse_Consumable_{{$dbItem->id}}" title="{{$dbItem->Consumable->title}}" icon="fas fa-long-arrow-alt-up rotate-45" btnTitle="Saída" color="red">
                            <x-form.form method="post" route="{{route('inventory_store_room_items.exitStore')}}">
                                <input hidden name="inventory_store_room_id" value="{{$dbItem->inventory_store_room_id}}">
                                <input hidden name="consumable_id" value="{{$dbItem->consumable_id}}">
                                <x-form.inputDisabled col="10" label="Suprimento" value="{{$dbItem->Consumable->title}}"/>
                                <x-form.input col="2" type="number" label="Quantidade" id="quantity" name="quantity" required="required"/>
                                <x-form.textarea col="12" name="description" />
                            </x-form.form>
                        </x-button.minButtonModal>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot
    </x-table.table>