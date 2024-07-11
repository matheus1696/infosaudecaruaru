<!-- Adicionar Item -->
<div class="inline-block">
    <!-- Modal toggle -->
    <button data-toggle="modal" data-target="#modal_create_item_warehouse_{{$db->department_id}}" class="px-2 py-1 text-xs text-white bg-orange-700 rounded-lg shadow-md hover:bg-orange-600" type="button">
        <i class="fas fa-plus"></i>
        <span class="ml-1 font-semibold">Add. Almoxarifado</span>
    </button>

    <div id="modal_create_item_warehouse_{{$db->department_id}}" class="modal fade"  role="dialog" aria-labelledby="modal_label_create_item_warehouse_{{$db->department_id}}" aria-hidden="true">
        <div class="text-left modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-lg font-semibold modal-title" id="modal_label_create_item_warehouse_{{$db->department_id}}">Adicionar Almoxarifado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="m-4 modal-body">
                    <x-form.form method="create" route="{{route('establishments.createWarehouse',['establishment'=>$db->id])}}">
                        <x-form.input col="12" label="Descrição do Almoxarifado" id="title" name="title" required="required"/>

                        <x-form.select col="12" label="Tipo de Almoxarifado" id="type_warehouse_id" name="type_warehouse_id">
                            @foreach ($dbEstablishmentTypeWarehouses as $dbEstablishmentTypeWarehouse)
                                <option value="{{$dbEstablishmentTypeWarehouse->id}}">
                                    {{$dbEstablishmentTypeWarehouse->title}}
                                </option>
                            @endforeach
                        </x-form.select>
                    </x-form.form>
                </div>
            </div>
        </div>
    </div>
</div>

