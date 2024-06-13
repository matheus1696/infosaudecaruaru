<x-table.table color="green">
    @slot('thead')
        <x-table.th class="w-40">Data Abertura</x-table.th>
        <x-table.th>Nº Solicitação</x-table.th>
        <x-table.th class="w-28">Qtd. Itens</x-table.th>
        <x-table.th class="w-20">Status</x-table.th>
        <x-table.th class="w-32"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestsCompleteds as $dbRequestCompleted)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y',strtotime($dbRequestCompleted->created_at))}}</x-table.td>
                <x-table.td>{{$dbRequestCompleted->code}}</x-table.td>
                <x-table.td>{{$dbRequestCompleted->count}}</x-table.td>
                <x-table.td>{{$dbRequestCompleted->status}}</x-table.td>
                <x-table.td>                    
                    <x-button.minButtonEdit route="{{route('store_rooms.edit',['store_room'=>$dbDepartment->id,'request'=>$dbRequestCompleted->id])}}" />
                    
                    <x-button.minButtonModalInfo id="Modal_{{$dbRequestCompleted->id}}" title="Solicitação Nº {{$dbRequestCompleted->code}}">
                        <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                            <p><strong>Nº da Solicitação:</strong> {{$dbRequestCompleted->code}}</p>
                            <p><strong>Título:</strong> {{$dbRequestCompleted->title ?? ""}}</p>
                            <p><strong>Estabelecimento:</strong> {{$dbRequestCompleted->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</p>
                            <p><strong>Departamento:</strong> {{$dbRequestCompleted->CompanyEstablishmentDepartment->title}}</p>
                            <p><strong>Contato:</strong> {{$dbRequestCompleted->department_contact ?? ""}}</p>
                            <p><strong>Ramal:</strong> {{$dbRequestCompleted->department_extension ?? ""}}</p>
                            <p><strong>Quantidade de Itens:</strong> {{$dbRequestCompleted->count}}</p>
                            <p><strong>Status:</strong> {{$dbRequestCompleted->status}}</p>
                            <hr>
                            <p><strong>Usuário Solicitante:</strong> {{$dbRequestCompleted->User->name}}</p>
                            <p><strong>Contato 01:</strong> {{$dbRequestCompleted->user_contact_1 ?? ""}}</p>
                            <p><strong>Contato 02:</strong> {{$dbRequestCompleted->user_contact_2 ?? ""}}</p>
                        </div>
                    </x-button.minButtonModalInfo>
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>