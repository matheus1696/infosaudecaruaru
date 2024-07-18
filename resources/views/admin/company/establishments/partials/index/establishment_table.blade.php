<!-- Components Table -->
<x-table.table :db="$db">
    <!-- Components THead -->
    @slot('thead')
        <x-table.th class="hidden md:table-cell">Código</x-table.th>
        <x-table.th>Estabelecimento</x-table.th>
        <x-table.th class="hidden md:table-cell">Bairro</x-table.th>
        <x-table.th class="hidden md:table-cell">Bloco Financeiro</x-table.th>
        <x-table.th class="w-28">Status</x-table.th>
        <x-table.th class="w-28"></x-table.th>
    @endslot

    <!-- Components TBody -->
    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td class="hidden md:table-cell">{{$item->code}}</x-table.td>
                <x-table.td>{{$item->title}}</x-table.td>
                <x-table.td class="hidden md:table-cell">{{$item->district}}</x-table.td>
                <x-table.td class="hidden md:table-cell">{{$item->FinancialBlock->title}}</x-table.td>
                <x-table.td>
                    <x-button.buttonStatus condition="{{$item->status}}" name="status" route="{{route('establishments.status',['establishment'=>$item->id])}}" />
                </x-table.td>
                <x-table.td>
                    <x-button.minButtonShow route="{{route('establishments.show',['establishment'=>$item->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>