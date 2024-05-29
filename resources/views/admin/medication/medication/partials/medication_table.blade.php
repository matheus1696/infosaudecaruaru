<x-table.table :db="$db">
    @slot('thead')
        <x-table.th>Suprimento</x-table.th>
        <x-table.th class="w-40">Tipo</x-table.th>
        <x-table.th class="w-40">Apresentação</x-table.th>
        <x-table.th class="w-28">Status</x-table.th>
        <x-table.th class="w-28"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$item->title}}</x-table.td>
                <x-table.td>{{$item->MedicationType->title}}</x-table.td>
                <x-table.td>{{$item->MedicationUnit->title}}</x-table.td>
                <x-table.td class="text-center">
                    <x-button.buttonStatus condition="{{$item->status}}" route="{{route('medications.status',['medication'=>$item->id])}}" name="status" />
                </x-table.td>
                <x-table.td>
                    <x-button.minButtonEdit route="{{route('medications.edit',['medication'=>$item->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>