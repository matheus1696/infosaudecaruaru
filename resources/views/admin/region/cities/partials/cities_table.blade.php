<x-table.table :db="$db">
    @slot('thead')
        <x-table.th>IBGE</x-table.th>
        <x-table.th>Municipios</x-table.th>
        <x-table.th >Estados</x-table.th>
        <x-table.th class="w-28">Status</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$item->code_ibge}}</x-table.td>
                <x-table.td>{{$item->city}}</x-table.td>
                <x-table.td>{{$item->RegionState->state}}</x-table.td>
                <x-table.td>
                    <x-button.buttonStatus condition="{{$item->status}}" route="{{route('cities.status',['city'=>$item->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>