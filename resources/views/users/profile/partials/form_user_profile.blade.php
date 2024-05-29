<!-- Inicio de Componentização do Conteiner -->
<x-conteiner>
    <h3 class="mb-3 text-lg font-semibold text-center">Dados do Pessoais</h3>

    <x-form.form method="edit" route="{{route('profiles.update',['profile'=>$db->id])}}">
            
            <x-form.input col="12" label="Nome Completo" name="name" id="name" value="{{$db->name}}" required="required" placeholder="Fulano da Pereira da Silva Dómino"/>

            <x-form.input col="6" label="Data Nascimento" type="date" name="birthday" id="birthday" value="{{$db->birthday}}" max="{{date('Y-m-d')}}" min="{{date('1900-01-01')}}"/>

            <x-form.select col="6" label="Sexo" name="sex_id" id="sex_id">
                @foreach ($dbUserSex as $UserSex)
                <option value="{{$UserSex->id}}" @if ($db->sex_id == $UserSex->id) selected @endif>{{$UserSex->sex}}
                </option>
                @endforeach
            </x-form.select>

            <x-form.input col="6" label="CPF" name="cpf" id="cpf" value="{{$db->cpf}}" maxlength="14" minlength="14" placeholder="000.000.000-00"/>
            
            <x-form.input col="6" label="Contato 1" type="tel" name="contact_1" id="contact_1" value="{{$db->contact_1}}" maxlength="15" minlength="13" placeholder="(00) 00000-0000"/>
                
            <x-form.input col="6" label="Contato 2" type="tel" name="contact_2" id="contact_2" value="{{$db->contact_2}}" maxlength="15" minlength="13" placeholder="(00) 00000-0000"/>

    </x-form.form>
</x-conteiner>