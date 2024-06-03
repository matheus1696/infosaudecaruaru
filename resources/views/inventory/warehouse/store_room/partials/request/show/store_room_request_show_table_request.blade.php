<x-table.table :db="$dbRequests">
    @slot('thead')
        <x-table.th class="w-28">Data Abert.</x-table.th>
        <x-table.th class="w-28">Nº Solicitação</x-table.th>
        <x-table.th class="w-28">Qtd. Itens</x-table.th>
        <x-table.th class="w-28">Status</x-table.th>
        <x-table.th class="w-28"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequests as $dbRequest)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y',strtotime($dbRequest->created_at))}}</x-table.td>
                <x-table.td>{{$dbRequest->code}}</x-table.td>
                <x-table.td>{{$dbRequest->count}}</x-table.td>
                <x-table.td>Status</x-table.td>
                <x-table.td>
                    
                    <x-button.minButtonEdit route="{{route('store_rooms.requestEdit',['request'=>$dbRequest->id])}}" />
                    
                    <x-button.minButtonModalInfo id="Modal_{{$dbRequest->id}}" title="Solicitação Nº {{$dbRequest->code}}">
                    </x-button.minButtonModalInfo>
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>