<x-table.table :db="$db">
    @slot('thead')
        <x-table.th>Nome das Listas</x-table.th>
        <x-table.th class="w-40">Tipo dos Suprimentos</x-table.th>
        <x-table.th class="w-28">Status</x-table.th>
        <x-table.th class="w-28">Detalhes</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$item->title}}</x-table.td>
                <x-table.td>{{$item->ConsumableType->title}}</x-table.td>
                <x-table.td class="text-center">
                    <x-button.buttonStatus condition="{{$item->status}}" route="{{route('standard_requests.status',['standard_request'=>$item->id])}}" name="status" />
                </x-table.td>
                <x-table.td>
                    <x-button.minButtonEdit route="{{route('standard_requests.edit',['standard_request'=>$item->id])}}" />
                    <x-button.minButtonShow route="{{route('standard_requests.show',['standard_request'=>$item->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>