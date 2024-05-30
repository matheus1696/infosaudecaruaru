<x-table.table :db="$db">
    @slot('thead')
        <x-table.th>Departamento</x-table.th>
        <x-table.th>Unidade</x-table.th>
        <x-table.th class="w-28"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$db->title}}</x-table.td>
                <x-table.td>{{$db->CompanyEstablishment->title}}</x-table.td>
                <x-table.td>
                    <x-button.minButtonShow route="{{route('show_.show',['standard_request'=>$item->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>