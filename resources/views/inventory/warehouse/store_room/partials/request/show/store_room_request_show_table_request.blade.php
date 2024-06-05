<x-table.table :db="$dbRequests">
    @slot('thead')
        <x-table.th class="w-16">Data Abert.</x-table.th>
        <x-table.th>Nº Solicitação</x-table.th>
        <x-table.th class="w-16">Qtd. Itens</x-table.th>
        <x-table.th class="w-20">Status</x-table.th>
        <x-table.th class="w-32"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequests as $dbRequest)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y',strtotime($dbRequest->created_at))}}</x-table.td>
                <x-table.td>{{$dbRequest->code}}</x-table.td>
                <x-table.td>{{$dbRequest->count}}</x-table.td>
                <x-table.td>{{$dbRequest->status}}</x-table.td>
                <x-table.td>                    
                    <x-button.minButtonEdit route="{{route('store_rooms.requestEdit',['request'=>$dbRequest->id])}}" />
                    
                    <x-button.minButtonModalInfo id="Modal_{{$dbRequest->id}}" title="Solicitação Nº {{$dbRequest->code}}">
                        <div>
                            <p><strong>Nº da Solicitação:</strong> {{$dbRequest->code}}</p>
                            <p><strong>Título:</strong> {{$dbRequest->title ?? ""}}</p>
                            <p><strong>Estabelecimento:</strong> {{$dbRequest->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</p>
                            <p><strong>Departamento:</strong> {{$dbRequest->CompanyEstablishmentDepartment->title}}</p>
                            <p><strong>Contato:</strong> {{$dbRequest->department_contact ?? ""}}</p>
                            <p><strong>Ramal:</strong> {{$dbRequest->department_extension ?? ""}}</p>
                            <p><strong>Quantidade de Itens:</strong> {{$dbRequest->count}}</p>
                            <p><strong>Status:</strong> {{$dbRequest->status}}</p>
                            <hr>
                            <p><strong>Usuário Solicitante:</strong> {{$dbRequest->User->name}}</p>
                            <p><strong>Contato 01:</strong> {{$dbRequest->user_contact_1 ?? ""}}</p>
                            <p><strong>Contato 02:</strong> {{$dbRequest->user_contact_2 ?? ""}}</p>
                        </div>
                    </x-button.minButtonModalInfo>
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>