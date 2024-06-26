<x-table.table color="red">
    @slot('thead')
        <x-table.th class="w-40">Data Abertura</x-table.th>
        <x-table.th class="w-40">Nº Solicitação</x-table.th>
        <x-table.th>Título</x-table.th>
        <x-table.th class="w-40">Unidade</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestsCanceled as $dbRequestCanceled)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y',strtotime($dbRequestCanceled->created_at))}}</x-table.td>
                <x-table.td>{{$dbRequestCanceled->code}}</x-table.td>
                <x-table.td>{{$dbRequestCanceled->title}}</x-table.td>
                <x-table.td>{{$dbRequestCanceled->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>