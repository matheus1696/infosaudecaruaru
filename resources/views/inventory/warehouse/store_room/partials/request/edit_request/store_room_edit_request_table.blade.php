<x-table.table :db="$dbRequestDetails">
    @slot('thead')
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-32">Estoque Atual</x-table.th>
        <x-table.th class="w-32">Qtd. Solicitada</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestDetails as $dbRequestDetail)
            <x-table.tr>
                <x-table.td>{{$dbRequestDetail->Consumable->title}}</x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity_current}}</x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity}}</x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>