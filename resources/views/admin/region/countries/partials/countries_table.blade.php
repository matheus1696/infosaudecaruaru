<x-table.table :db="$db">
    @slot('thead')
            <x-table.th>Código</x-table.th>
            <x-table.th>Siglas</x-table.th>
            <x-table.th>Pais</x-table.th>
            <x-table.th>Pais em Inglês</x-table.th>
            <x-table.th>DDI</x-table.th>
            <x-table.th class="w-28">Status</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$item->code_iso}}</x-table.td>
                <x-table.td>{{$item->acronym_3}}</x-table.td>
                <x-table.td>{{$item->country}}</x-table.td>
                <x-table.td>{{$item->country_ing}}</x-table.td>
                <x-table.td>{{$item->code_ddi}}</x-table.td>
                <x-table.td>
                    <x-button.buttonStatus condition="{{$item->status}}" route="{{route('countries.status',['country'=>$item->id])}}" name="status" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>