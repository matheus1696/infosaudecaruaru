<x-table.table :db="$dbRequests">
    @slot('thead')
        <x-table.th class="w-20">Data Abert.</x-table.th>
        <x-table.th>Nº Solicitação</x-table.th>
        <x-table.th>Unidade</x-table.th>
        <x-table.th class="w-16">Qtd. Itens</x-table.th>
        <x-table.th class="w-20">Status</x-table.th>
        <x-table.th class="w-32"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequests as $dbRequest)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y',strtotime($dbRequest->created_at))}}</x-table.td>
                <x-table.td>{{$dbRequest->code}}</x-table.td>
                <x-table.td>{{$dbRequest->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</x-table.td>
                <x-table.td>{{$dbRequest->count}}</x-table.td>
                <x-table.td>{{$dbRequest->status}}</x-table.td>
                <x-table.td>                    
                    <x-button.minButtonShow route="{{route('warehouse_centers.edit',['warehouse_center'=>$dbDepartment->id,'request'=>$dbRequest->id])}}" color="green" icon="fas fa-list" title="Atender"/>
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>