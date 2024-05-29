<x-table.table :db="$db">
    @slot('thead')
        <x-table.th>UF</x-table.th>
        <x-table.th>Sigla</x-table.th>
        <x-table.th>Estados</x-table.th>
        <x-table.th>Paises</x-table.th>
        <x-table.th class="w-28">Status</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td class="text-center">{{$item->code_uf}}</x-table.td>
                <x-table.td class="text-center">{{$item->acronym}}</x-table.td>
                <x-table.td class="text-center">{{$item->state}}</x-table.td>
                <x-table.td class="text-center">{{$item->RegionCountry->country}}</x-table.td>
                <x-table.td class="text-center">
                    <x-button.buttonStatus condition="{{$item->status}}"
                        route="{{route('states.status',['state'=>$item->id])}}" name="status" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>