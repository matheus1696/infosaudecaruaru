<x-table.table color="sky">
    @slot('thead')
        <x-table.th class="w-40">Data Abertura</x-table.th>
        <x-table.th class="w-40">Nº Solicitação</x-table.th>
        <x-table.th>Título</x-table.th>
        <x-table.th class="w-40">Unidade</x-table.th>
        <x-table.th class="w-32"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestsForwarded as $dbRequestForwarded)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y',strtotime($dbRequestForwarded->created_at))}}</x-table.td>
                <x-table.td>{{$dbRequestForwarded->code}}</x-table.td>
                <x-table.td>{{$dbRequestForwarded->title}}</x-table.td>
                <x-table.td>{{$dbRequestForwarded->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</x-table.td>
                <x-table.td>
                    <x-button.minButtonShow route="{{route('warehouse.centers.edit',['center'=>$dbDepartment->id,'request'=>$dbRequestForwarded->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>