<x-table.table color="red">
    @slot('thead')
        <x-table.th class="w-40">Data Abertura</x-table.th>
        <x-table.th>Nº Solicitação</x-table.th>
        <x-table.th class="w-28">Qtd. Itens</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestsCanceleds as $dbRequestsCanceled)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y H:i:s',strtotime($dbRequestsCanceled->created_at))}}</x-table.td>
                <x-table.td>{{$dbRequestsCanceled->code}}</x-table.td>
                <x-table.td>{{$dbRequestsCanceled->count}}</x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>