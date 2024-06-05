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
        <x-table.th class="w-32">Quantidade</x-table.th>
        <x-table.th class="w-28"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$item->Consumable->title}}</x-table.td>
                <x-table.td>{{$item->quantity}}</x-table.td>
                <x-table.td>
                    <x-button.minButtonModalInfo id="Modal_{{$item->id}}" title="Informar Saída de {{$item->Consumable->title}}" icon="fas fa-long-arrow-alt-down rotate-45" color="red" btnTitle="Saída">
                        <x-form.form method="edit" route="{{route('warehouse_centers.exitStore',['warehouse_center'=>$item->id])}}" title="Confirmar Saída" color="red">
                            <input hidden name="department_id" value="{{$item->department_id}}">
                            <x-form.input col="9" label="Suprimento" name="consumable_id" value="{{$item->Consumable->title}}" disabled="disabled"/>
                            <x-form.input col="3" type="number" label="Quantidade" id="quantity" name="quantity" min="1" max="{{$item->quantity}}"/>
                        </x-form.form>
                    </x-button.minButtonModalInfo>
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>