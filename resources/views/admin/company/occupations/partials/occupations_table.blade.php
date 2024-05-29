<x-table.table :db="$db">
    @slot('thead')
        <x-table.th>Código</x-table.th>
        <x-table.th>Ocupação (CBO)</x-table.th>
        <x-table.th class="w-28">Status</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$item->code}}</x-table.td>
                <x-table.td>{{$item->title}}</x-table.td>
                <x-table.td>
                    <x-button.buttonStatus condition="{{$item->status}}" route="{{route('occupations.update',['occupation'=>$item->id])}}" name="status" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>