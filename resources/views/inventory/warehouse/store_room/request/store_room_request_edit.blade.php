<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitação Nº: {{$db->code}}"
            routeBack="{{route('store_rooms.requestShow',['store_room'=>$db->department_id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.warehouse.request.partials.edit.request_description')
        </x-conteiner>
        <div class="flex flex-col items-center justify-end col-span-12 gap-1 mb-2 md:flex-row">    
            <h3 class="flex-1 col-span-12 px-3 text-lg font-semibold">Lista de Itens Solicitados</h3>        
            @if ($db->status == "Aberto")
                <div class="flex">
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
                                        <x-form.form method="edit" route="{{route('requests.update',['warehouse'=>$db->department_id,'request'=>$db->id])}}" color="green">
                                            <x-form.select col="9" label="Suprimentos" id="consumable_id" name="consumable_id">
                                                @foreach ($dbConsumables as $dbConsumable)
                                                    <option value="{{$dbConsumable->id}}">{{$dbConsumable->title}}</option>
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
                                        <x-form.form method="create" route="{{route('store_rooms.requestStandardRequest',['store_room'=>$db->department_id,'request'=>$db->id])}}" title="Adicionar Itens">
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
                        <form action="{{route('store_rooms.requestStandardRequest',['store_room'=>$db->department_id,'request'=>$db->id])}}" method="post" class="d-inline-block">
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
            @endif            
        </div>
        @include('inventory.warehouse.request.partials.edit.request_table')
    @endslot
</x-pages.index>