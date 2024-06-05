<div class="flex flex-row items-center justify-end col-span-12 gap-1 mb-2">       

    <!-- Adicionar Item -->
    <div class="inline-block">
        <!-- Modal toggle -->
        <button 
            data-toggle="modal"
            data-target="#modalInfo_Consumable_{{$db->department_id}}"
            class="px-2 py-1 m-1 text-xs text-white bg-green-700 rounded-lg shadow-md hover:bg-green-600" 
            type="button"
        >
            <i class="fas fa-plus"></i>
            <span class="ml-1 font-semibold">Add. Item</span>
        </button>
    
        <div id="modalInfo_Consumable_{{$db->department_id}}" class="modal fade"  role="dialog" aria-labelledby="modalLabelInfo_Consumable_{{$db->department_id}}" aria-hidden="true">
            <div class="text-left modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="text-lg font-semibold modal-title" id="modalLabelInfo_Consumable_{{$db->department_id}}">Adicionar Suprimentos a Solicitação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="m-4 modal-body">
                        <x-form.form method="edit" route="{{route('store_rooms.requestUpdate',['request'=>$db->id])}}" color="green">
                            <x-form.select col="9" label="Suprimentos" id="consumable_id" name="consumable_id">
                                @foreach ($dbConsumables as $dbConsumable)
                                    <option value="{{$dbConsumable->id}}" @isset($db) @if ($db->consumable_id == $dbConsumable->id) selected @endif @endisset>
                                        {{$dbConsumable->title}}
                                    </option>
                                @endforeach
                            </x-form.select>
                            <x-form.input col="3" type="number" label="Quantidade" id="quantity" name="quantity" min="1" max="{{$db->quantity}}"/>
                        </x-form.form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Listas Padrões -->
    <div class="inline-block">
        <!-- Modal toggle -->
        <button 
            data-toggle="modal"
            data-target="#modalInfo_StandardRequest_{{$db->department_id}}"
            class="px-2 py-1 m-1 text-xs text-white bg-green-700 rounded-lg shadow-md hover:bg-green-600" 
            type="button"
        >
            <i class="fas fa-list"></i>
            <span class="ml-1 font-semibold">Lista de Suprimentos</span>
        </button>
    
        <div id="modalInfo_StandardRequest_{{$db->department_id}}" class="modal fade"  role="dialog" aria-labelledby="modalLabelInfo_StandardRequest_{{$db->department_id}}" aria-hidden="true">
            <div class="text-left modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="text-lg font-semibold modal-title" id="modalLabelInfo_StandardRequest_{{$db->department_id}}">Titulo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="m-4 modal-body">
                        <x-form.form method="create" route="{{route('store_rooms.requestStandardRequest',['request'=>$db->id])}}" title="Adicionar Itens">
                            <x-form.select col="12" label="Lista de Solicitações Padrões" id="standard_request" name="standard_request">
                                @foreach ($dbStandardRequests as $dbStandardRequest)
                                    <option value="{{$dbStandardRequest->id}}">
                                        {{$dbStandardRequest->title}}
                                    </option>
                                @endforeach
                            </x-form.select>
                        </x-form.form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Excluir itens cadastrados -->
    <div class="inline-block">
        <form action="{{route('store_rooms.requestStandardRequest',['request'=>$db->id])}}" method="post" class="d-inline-block">
            @csrf
            <input hidden name="standardRequestDestroy" value="true">
            <button
                type="submit"
                class="px-2 py-1 m-1 text-xs text-white bg-red-700 rounded-lg shadow-md hover:bg-red-900"
                onclick="return confirm('Realmente deseja realizar a exclusão de todos os itens adicionados?')"
            >
                <i class="fas fa-trash"></i>
                <span class="ml-1 font-semibold">Remover Itens</span>
            </button>
        </form>
    </div>
    
</div>

<x-table.table :db="$dbRequestDetails">
    @slot('thead')
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-32">Estoque Atual</x-table.th>
        <x-table.th class="w-32">Qtd. Padrão</x-table.th>
        <x-table.th class="w-32">Qtd. Solicitada</x-table.th>
        <x-table.th class="w-28"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbRequestDetails as $dbRequestDetail)
            <x-table.tr>
                <x-table.td>{{$dbRequestDetail->Consumable->title}}</x-table.td>
                <x-table.td>
                    @foreach ($dbStoreRoomInventories as $dbStoreRoomInventory)
                        @if ($dbRequestDetail->consumable_id == $dbStoreRoomInventory->consumable_id)
                            {{$dbStoreRoomInventory->quantity}}
                        @else
                            0
                        @endif
                    @endforeach
                </x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity}}</x-table.td>
                <x-table.td>
                    @foreach ($dbStoreRoomInventories as $dbStoreRoomInventory)
                        @if ($dbRequestDetail->consumable_id === $dbStoreRoomInventory->consumable_id)
                            {{$dbRequestDetail->quantity - $dbStoreRoomInventory->quantity}}
                        @else
                            {{$dbRequestDetail->quantity}}
                        @endif
                    @endforeach
                </x-table.td>
                <x-table.td>
                    <x-button.minButtonModalEdit id="requestDetails_{{$dbRequestDetail->id}}" title="Alterar quantidade da solicitação do suprimento">
                        <x-form.form method="edit" route="{{route('store_rooms.requestUpdate',['request'=>$db->id])}}" title="Alterar Quantidade" color="sky">
                            <input hidden id="consumableEdit" name="consumableEdit" value="{{$dbRequestDetail->consumable_id}}">
                            <x-form.input col="9" label="Suprimentos" name="disabled" value="{{$dbRequestDetail->Consumable->title}}" disabled="disabled"/>
                            <x-form.input col="3" type="number" label="Quantidade" id="quantityEdit" name="quantityEdit" min="1" value="{{$dbRequestDetail->quantity}}"/>

                        </x-form.form>
                    </x-button.minButtonModalEdit>
                    <x-button.minButtonDelete route="{{route('store_rooms.requestDelete',['request'=>$dbRequestDetail->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>