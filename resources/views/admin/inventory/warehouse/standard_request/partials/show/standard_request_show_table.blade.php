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
                    Modal Edit
                    Button Destroy
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>