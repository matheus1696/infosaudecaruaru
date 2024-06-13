<x-table.table color="yellow">
    @slot('thead')
        <x-table.th class="w-40">Data Abertura</x-table.th>
        <x-table.th>Nº Solicitação</x-table.th>
        <x-table.th class="w-28">Qtd. Itens</x-table.th>
        <x-table.th class="w-20">Status</x-table.th>
        <x-table.th class="w-32"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestsOpen as $dbRequestOpen)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y',strtotime($dbRequestOpen->created_at))}}</x-table.td>
                <x-table.td>{{$dbRequestOpen->code}}</x-table.td>
                <x-table.td>{{$dbRequestOpen->count}}</x-table.td>
                <x-table.td>{{$dbRequestOpen->status}}</x-table.td>
                <x-table.td>                    
                    <x-button.minButtonEdit route="{{route('store_rooms.edit',['store_room'=>$dbDepartment->id,'request'=>$dbRequestOpen->id])}}" />
                    
                    <x-button.minButtonModalInfo id="Modal_{{$dbRequestOpen->id}}" title="Solicitação Nº {{$dbRequestOpen->code}}">
                        <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                            <p><strong>Nº da Solicitação:</strong> {{$dbRequestOpen->code}}</p>
                            <p><strong>Título:</strong> {{$dbRequestOpen->title ?? ""}}</p>
                            <p><strong>Estabelecimento:</strong> {{$dbRequestOpen->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</p>
                            <p><strong>Departamento:</strong> {{$dbRequestOpen->CompanyEstablishmentDepartment->title}}</p>
                            <p><strong>Contato:</strong> {{$dbRequestOpen->department_contact ?? ""}}</p>
                            <p><strong>Ramal:</strong> {{$dbRequestOpen->department_extension ?? ""}}</p>
                            <p><strong>Quantidade de Itens:</strong> {{$dbRequestOpen->count}}</p>
                            <p><strong>Status:</strong> {{$dbRequestOpen->status}}</p>
                            <hr>
                            <p><strong>Usuário Solicitante:</strong> {{$dbRequestOpen->User->name}}</p>
                            <p><strong>Contato 01:</strong> {{$dbRequestOpen->user_contact_1 ?? ""}}</p>
                            <p><strong>Contato 02:</strong> {{$dbRequestOpen->user_contact_2 ?? ""}}</p>
                        </div>
                    </x-button.minButtonModalInfo>
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>