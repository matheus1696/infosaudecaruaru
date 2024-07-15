<!-- Adicionar Item -->
<div class="inline-block">
    <!-- Modal toggle -->
    <button data-toggle="modal" data-target="#modal_create_item_consumable_{{$db->department_id}}" class="px-2 py-1 text-xs text-white bg-green-700 rounded-lg shadow-md hover:bg-green-600" type="button">
        <i class="fas fa-plus"></i>
        <span class="ml-1 font-semibold">Add. Departamento</span>
    </button>

    <div id="modal_create_item_consumable_{{$db->department_id}}" class="modal fade"  role="dialog" aria-labelledby="modal_label_create_item_consumable_{{$db->department_id}}" aria-hidden="true">
        <div class="text-left modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-lg font-semibold modal-title" id="modal_label_create_item_consumable_{{$db->department_id}}">Adicionar Departamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="m-4 modal-body">
                    <x-form.form method="create" route="{{route('establishment_departments.store')}}">
                        <input type="hidden" id="establishment_id" name="establishment_id" value="{{$db->id}}">
                        <x-form.input col="5" label="Departamento" id="title" name="title" required="required"/>
                        <x-form.input col="2" type="tel" label="Telefone" id="contact" name="contact" required="required"/>
                        <x-form.input col="2" type="number" label="Ramal" id="extension" name="extension" required="required"/>                                
                    
                        <x-form.select col="3" label="Tipo de Contato" id="type_contact" name="type_contact">
                            <option value="Without">Sem Ramal</option>
                            <option value="Main">Contato Externo</option>
                            <option value="Internal">Ramal Interno</option>
                        </x-form.select>
                    </x-form.form>
                </div>
            </div>
        </div>
    </div>
</div>