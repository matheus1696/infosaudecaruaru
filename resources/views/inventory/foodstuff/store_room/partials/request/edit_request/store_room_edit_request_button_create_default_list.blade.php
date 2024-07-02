<!-- Modal Listas Padrões -->
<div class="inline-block">
    <!-- Modal toggle -->
    <button 
        data-toggle="modal"
        data-target="#modal_default_list_{{$db->department_id}}"
        class="px-2 py-1 m-1 text-xs text-white bg-green-700 rounded-lg shadow-md hover:bg-green-600" 
        type="button"
    >
        <i class="fas fa-list"></i>
        <span class="ml-1 font-semibold">Lista de Suprimentos</span>
    </button>

    <div id="modal_default_list_{{$db->department_id}}" class="modal fade"  role="dialog" aria-labelledby="modal_label_default_list_{{$db->department_id}}" aria-hidden="true">
        <div class="text-left modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-lg font-semibold modal-title" id="modal_label_default_list_{{$db->department_id}}">Titulo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="m-4 modal-body">
                    <x-form.form method="create" route="{{route('foodstuff.store_rooms.createDefaultList',['store_room'=>$db->department_id,'request'=>$db->id])}}" title="Adicionar Itens">
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