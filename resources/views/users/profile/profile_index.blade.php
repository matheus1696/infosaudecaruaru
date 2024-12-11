<!-- Inicio de Componentização da Página Index -->
<x-pages.index>
    @slot('body')
        <div class="flex justify-center items-center min-h-96 md:mt-20">
            <div class="w-full md:w-2/4 xl:w-2/3">
                <!-- Inicio de Componentização do Conteiner -->
                <x-conteiner>
                    <h3 class="mb-3 text-lg font-semibold text-center">Dados do Pessoais</h3>

                    <form action="{{route('profiles.updateProfile')}}" method="post">
                        @csrf @method('PUT')

                        <div>
                            <x-form.form-group>
                                <x-form.form-label for="name" value="Nome"/>
                                <x-form.form-input />
                                <x-form.error-message for="name" />
                            </x-form.form-group>
                        </div>

                        <x-button.btn-primary />
                    </form>

                    <x-form.form method="edit" route="{{route('profiles.updateProfile')}}">
                            
                        <x-form.input col="12" label="Nome Completo" name="name" value="{{$db->name}}" required="required" placeholder="Fulano da Pereira da Silva Dómino"/>

                        <x-form.input col="6" label="Data Nascimento" type="date" name="birthday" value="{{$db->birthday}}" max="{{date('2010-01-01')}}" min="{{date('1900-01-01')}}"/>

                        <x-form.select col="6" label="Sexo" name="sex_id">
                            @foreach ($dbUserSex as $UserSex)
                            <option  value="{{$UserSex->id}}" @if ($db->sex_id == $UserSex->id) selected @endif >
                                {{$UserSex->sex}}
                            </option>
                            @endforeach
                        </x-form.select>

                        <x-form.input col="6" label="CPF" name="cpf" value="{{$db->cpf}}" maxlength="14" minlength="14" placeholder="000.000.000-00"/>
                        
                        <x-form.input col="6" label="RG" name="registration" value="{{$db->registration}}" maxlength="10" minlength="9" placeholder="00.000.000"/>

                        <x-form.input col="6" label="Contato 1" type="tel" name="contact_1" value="{{$db->contact_1}}" maxlength="15" minlength="13" placeholder="(00) 00000-0000"/>
                            
                        <x-form.input col="6" label="Contato 2" type="tel" name="contact_2" value="{{$db->contact_2}}" maxlength="15" minlength="13" placeholder="(00) 00000-0000"/>

                    </x-form.form>
                </x-conteiner>
            </div>
        </div>
    @endslot
</x-pages.index>