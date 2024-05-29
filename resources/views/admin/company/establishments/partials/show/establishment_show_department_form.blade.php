<x-form.form method="create" route="{{route('establishment_departments.store')}}">
    <input type="hidden" id="establishment_id" name="establishment_id" value="{{$db->id}}">
    <x-form.input col="5" label="Departamento" id="department" name="department" required="required"/>
    <x-form.input col="2" type="tel" label="Telefone" id="contact" name="contact" required="required"/>
    <x-form.input col="2" type="number" label="Ramal" id="extension" name="extension" required="required"/>                                

    <x-form.select col="3" label="Tipo de Contato" id="type_contact" name="type_contact">
        <option value="Without">Sem Ramal</option>
        <option value="Main">Contato Externo</option>
        <option value="Internal">Ramal Interno</option>
    </x-form.select>
</x-form.form>