<x-table.table color="yellow">
    @slot('thead')
        <x-table.th class="w-40">Data Abertura</x-table.th>
        <x-table.th class="w-40">Nº Solicitação</x-table.th>
        <x-table.th>Título</x-table.th>
        <x-table.th class="w-40">Unidade</x-table.th>
        <x-table.th class="w-32"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestsOpen as $dbRequestOpen)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y',strtotime($dbRequestOpen->created_at))}}</x-table.td>
                <x-table.td>{{$dbRequestOpen->code}}</x-table.td>
                <x-table.td>{{$dbRequestOpen->title}}</x-table.td>
                <x-table.td>{{$dbRequestOpen->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</x-table.td>
                <x-table.td>                    
                    <x-button.minButtonEdit route="{{route('warehouse.store_rooms.editRequest',['store_room'=>$dbDepartment->id,'request'=>$dbRequestOpen->id])}}" />
                    
                    <x-button.minButtonModalInfo id="Modal_{{$dbRequestOpen->id}}" title="Solicitação Nº {{$dbRequestOpen->code}}">
                        <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                            <p><strong>Nº da Solicitação:</strong> {{$dbRequestOpen->code}}</p>
                            <p><strong>Status:</strong> {{$dbRequestOpen->status}}</p>
                            <p class="md:col-span-2"><strong>Título:</strong> {{$dbRequestOpen->title ?? ""}}</p>
                            <p class="md:col-span-2"><strong>Estabelecimento:</strong> {{$dbRequestOpen->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</p>
                            <p class="md:col-span-2"><strong>Departamento:</strong> {{$dbRequestOpen->CompanyEstablishmentDepartment->department}}</p>
                            <p><strong>Contato:</strong> {{$dbRequestOpen->department_contact ?? ""}}</p>
                            <p><strong>Ramal:</strong> {{$dbRequestOpen->department_extension ?? ""}}</p>
                            <hr  class="md:col-span-2">
                            <p class="md:col-span-2"><strong>Usuário Solicitante:</strong> {{$dbRequestOpen->User->name}}</p>
                            <p><strong>Contato 01:</strong> {{$dbRequestOpen->user_contact_1 ?? ""}}</p>
                            <p><strong>Contato 02:</strong> {{$dbRequestOpen->user_contact_2 ?? ""}}</p>
                        </div>
                    </x-button.minButtonModalInfo>
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>