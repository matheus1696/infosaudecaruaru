<nav>
    <div class="mb-3 nav nav-tabs" id="nav-tab" role="tablist">
        @foreach ($dbRequestStatuses as $dbRequestStatus)    
            <button class="nav-link @if($dbRequestStatus->id == 1) active @endif" id="nav-requests-{{$dbRequestStatus->filter}}-tab" data-toggle="tab" data-target="#nav-requests-{{$dbRequestStatus->filter}}" type="button" role="tab" aria-controls="nav-requests-{{$dbRequestStatus->filter}}" aria-selected=" @if($dbRequestStatus->id == 1) true @else false @endif">
                <span class="text-sm font-semibold">{{$dbRequestStatus->title}}</span>
            </button>
        @endforeach
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">

    @foreach ($dbRequestStatuses as $dbRequestStatus)
        <div class="tab-pane fade show @if($dbRequestStatus->id == 1) active @endif" id="nav-requests-{{$dbRequestStatus->filter}}" role="tabpanel" aria-labelledby="nav-requests-{{$dbRequestStatus->filter}}-tab">        
            <x-table.table color="{{$dbRequestStatus->color}}">
                @slot('thead')
                    <x-table.th class="w-40">Data Abertura</x-table.th>
                    <x-table.th class="w-40">Nº Solicitação</x-table.th>
                    <x-table.th>Título</x-table.th>
                    <x-table.th class="w-40">Unidade</x-table.th>
                    <x-table.th class="w-32"></x-table.th>
                @endslot
            
                @slot('tbody')
                    @foreach ($dbRequests as $dbRequest)
                        @if ($dbRequest->status_id == $dbRequestStatus->id)
                            <x-table.tr>
                                <x-table.td>{{date('d/m/Y',strtotime($dbRequest->created_at))}}</x-table.td>
                                <x-table.td>{{$dbRequest->code}}</x-table.td>
                                <x-table.td>{{$dbRequest->title}}</x-table.td>
                                <x-table.td>{{$dbRequest->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</x-table.td>
                                <x-table.td>                    
                                    <x-button.minButtonEdit route="{{route('warehouse.store_rooms.editRequest',['store_room'=>$dbDepartment->id,'request'=>$dbRequest->id])}}" />
                                    
                                    <x-button.minButtonModalInfo id="Modal_{{$dbRequest->id}}" title="Solicitação Nº {{$dbRequest->code}}">
                                        <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                                            <p><strong>Nº da Solicitação:</strong> {{$dbRequest->code}}</p>
                                            <p><strong>Status:</strong> {{$dbRequest->status}}</p>
                                            <p class="md:col-span-2"><strong>Título:</strong> {{$dbRequest->title ?? ""}}</p>
                                            <p class="md:col-span-2"><strong>Estabelecimento:</strong> {{$dbRequest->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</p>
                                            <p class="md:col-span-2"><strong>Departamento:</strong> {{$dbRequest->CompanyEstablishmentDepartment->department}}</p>
                                            <p><strong>Contato:</strong> {{$dbRequest->department_contact ?? ""}}</p>
                                            <p><strong>Ramal:</strong> {{$dbRequest->department_extension ?? ""}}</p>
                                            <hr  class="md:col-span-2">
                                            <p class="md:col-span-2"><strong>Usuário Solicitante:</strong> {{$dbRequest->User->name}}</p>
                                            <p><strong>Contato 01:</strong> {{$dbRequest->user_contact_1 ?? ""}}</p>
                                            <p><strong>Contato 02:</strong> {{$dbRequest->user_contact_2 ?? ""}}</p>
                                        </div>
                                    </x-button.minButtonModalInfo>
                                </x-table.td>
                            </x-table.tr>
                        @endif
                    @endforeach
                @endslot
            </x-table.table>
        </div>
    @endforeach
</div>