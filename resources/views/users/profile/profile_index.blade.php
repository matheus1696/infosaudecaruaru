<!-- Inicio de Componentização da Página Index -->
<x-pages.index>
    @slot('body')
        <div class="flex justify-center items-center min-h-96 md:pt-20">
            <div class="w-full md:w-2/4 xl:w-2/3">
                <!-- Inicio de Componentização do Conteiner -->
                <x-conteiner>
                    <h3 class="mb-3 text-lg font-semibold text-center">Dados do Pessoais</h3>

                    <x-form.form-erros />

                    <form action="{{route('profiles.updateProfile')}}" method="post">
                        @csrf @method('PUT')

                        <x-form.form-group>
                            <div class="col-span-12">
                                <x-form.form-label for="name" value="Nome"/>
                                <x-form.form-input name="name" value="{{ old('name') ?? $db->name }}" placeholder="Nome Completo" required />
                                <x-form.error-message for="name" />
                            </div>
                            <div class="col-span-6">                                    
                                <x-form.form-label for="birthday" value="Data Nascimento"/>
                                <x-form.form-input type="date" name="birthday" value="{{ old('birthday') ?? $db->birthday }}" max="{{date('2010-01-01')}}" min="{{date('1900-01-01')}}" />
                                <x-form.error-message for="birthday" />
                            </div>
                            <div class="col-span-6">
                                <x-form.form-label for="sex_id" value="Sexo"/>
                                <x-form.form-select name="sex_id">
                                    @foreach ($dbUserSex as $UserSex)
                                        <option class="hover:bg-green-600" value="{{$UserSex->id}}" @if ($db->sex_id == $UserSex->id) selected @endif >
                                            {{$UserSex->sex}}
                                        </option>
                                    @endforeach
                                </x-form.form-select>
                                <x-form.error-message for="sex_id" />
                            </div>
                            <div class="col-span-6">                                    
                                <x-form.form-label for="cpf" value="CPF"/>
                                <x-form.form-input name="cpf" value="{{ old('cpf') ?? $db->cpf }}" maxlength="14" minlength="14" placeholder="000.000.000-00" onkeyup="handleCPF(event)" />
                                <x-form.error-message for="cpf" />
                            </div>
                            <div class="col-span-6">                                    
                                <x-form.form-label for="registration" value="RG"/>
                                <x-form.form-input name="registration" value="{{ old('registration') ?? $db->registration }}" maxlength="10" minlength="9" placeholder="00.000.000" onkeyup="handleRegistration(event)" />
                                <x-form.error-message for="registration" />
                            </div>
                            <div class="col-span-6">                                    
                                <x-form.form-label for="contact_1" value="Contato Principal"/>
                                <x-form.form-input name="contact_1" value="{{ old('contact_1') ?? $db->contact_1 }}" maxlength="15" minlength="13" placeholder="(00)00000-0000" onkeyup="handlePhone(event)" />
                                <x-form.error-message for="contact_1" />
                            </div>
                            <div class="col-span-6">                                    
                                <x-form.form-label for="contact_2" value="Contato Principal"/>
                                <x-form.form-input name="contact_2" value="{{ old('contact_1') ?? $db->contact_2 }}" maxlength="15" minlength="13" placeholder="(00)00000-0000" onkeyup="handlePhone(event)" />
                                <x-form.error-message for="contact_2" />
                            </div>
                        </x-form.form-group>

                        <x-button.btn-primary value="Salvar Alteração"/>
                    </form>
                </x-conteiner>
            </div>
        </div>
    @endslot
</x-pages.index>