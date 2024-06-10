<x-table.table>
    @slot('thead')
        <x-table.th class="w-20">Data Abert.</x-table.th>
        <x-table.th>Nº Solicitação</x-table.th>
        <x-table.th>Unidade</x-table.th>
        <x-table.th class="w-16">Qtd. Itens</x-table.th>
        <x-table.th class="w-20">Status</x-table.th>
        <x-table.th class="w-32"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestSents as $dbRequestSent)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y',strtotime($dbRequestSent->created_at))}}</x-table.td>
                <x-table.td>{{$dbRequestSent->code}}</x-table.td>
                <x-table.td>{{$dbRequestSent->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</x-table.td>
                <x-table.td>{{$dbRequestSent->count}}</x-table.td>
                <x-table.td>{{$dbRequestSent->status}}</x-table.td>
                <x-table.td>                    
                    <x-button.minButtonShow route="{{route('warehouse_centers.requestEdit',['warehouse_center'=>$dbDepartment->id,'request'=>$dbRequestSent->id])}}" color="sky" icon="fas fa-list" title="Verificar"/>
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>