<x-table.table :db="$db">
    @slot('thead')
        <x-table.th>Departamento</x-table.th>
        <x-table.th>Unidade</x-table.th>
        <x-table.th class="w-28"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$item->department}}</x-table.td>
                <x-table.td>{{$item->CompanyEstablishment->title}}</x-table.td>
                <x-table.td>
                    <x-button.minButtonShow route="{{route('warehouse.centers.show',['center'=>$item->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>