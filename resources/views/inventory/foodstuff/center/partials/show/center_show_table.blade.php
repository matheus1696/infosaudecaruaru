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
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$item->Consumable->title}}</x-table.td>
                <x-table.td>{{$item->CompanyFinancialBlock->acronym}}</x-table.td>
                <x-table.td>{{$item->quantity}}</x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>