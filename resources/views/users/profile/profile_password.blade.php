<!-- Inicio de Componentização da Página Index -->
<x-pages.index>
    @slot('body')
        <div class="flex justify-center items-center min-h-96 md:mt-20">
            <div class="w-full md:w-2/4 xl:w-1/3">
                <!-- Inicio de Componentização do Conteiner -->
                <x-conteiner>
                    <h3 class="mb-3 text-lg font-semibold text-center">Alteração de Senha</h3>

                    <x-form.form method="edit" route="{{route('profiles.updatePassword')}}">
                        @csrf @method('PUT')

                        <!-- Inicio de Componentização de Input e Select -->
                        <x-form.inputDisabled col="12" label="Email" value="{{$db->email}}"/>
                        <x-form.input col="12" label="Senha Atual" type="password" name="password_current" id="password_current" placeholder="********"/>
                        <x-form.input col="12" label="Senha" type="password" name="password" id="password" placeholder="********"/>
                        <x-form.input col="12" label="Confirmar Senha" type="password" name="password_confirmation" id="password_confirmation" placeholder="********" />
                            
                    </x-form.form>
                </x-conteiner>
            </div>
        </div>
    @endslot
</x-pages.index>