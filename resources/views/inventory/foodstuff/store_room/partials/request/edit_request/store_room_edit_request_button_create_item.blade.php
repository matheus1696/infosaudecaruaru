<!-- Adicionar Item -->
<div class="inline-block">
    <!-- Modal toggle -->
    <button data-toggle="modal" data-target="#modal_create_item_consumable_{{$db->department_id}}" class="px-2 py-1 m-1 text-xs text-white bg-green-700 rounded-lg shadow-md hover:bg-green-600" type="button">
        <i class="fas fa-plus"></i>
        <span class="ml-1 font-semibold">Add. Item</span>
    </button>

    <div id="modal_create_item_consumable_{{$db->department_id}}" class="modal fade"  role="dialog" aria-labelledby="modal_label_create_item_consumable_{{$db->department_id}}" aria-hidden="true">
        <div class="text-left modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-lg font-semibold modal-title" id="modal_label_create_item_consumable_{{$db->department_id}}">Adicionar Suprimentos a Solicitação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="m-4 modal-body">
                    <x-form.form method="create" route="{{route('foodstuff.store_rooms.createItem',['store_room'=>$db->department_id,'request'=>$db->id])}}" color="green">
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