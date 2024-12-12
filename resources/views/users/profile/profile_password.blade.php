<!-- Inicio de Componentização da Página Index -->
<x-pages.index>
    @slot('body')
        <div class="flex justify-center items-center min-h-96 md:mt-20">
            <div class="w-full md:w-2/4 xl:w-2/3">
                <!-- Inicio de Componentização do Conteiner -->
                <x-conteiner>
                    <h3 class="mb-3 text-lg font-semibold text-center">Alteração de Senha</h3>

                    <x-form.form-erros />

                    <form action="{{route('profiles.updatePassword')}}" method="post">
                        @csrf @method('PUT')

                        <x-form.form-group>
                            <div class="col-span-12">                                    
                                <x-form.form-label for="name" value="Nome"/>
                                <x-form.form-input value="{{ $db->name }}" disabled />
                            </div>
                            <div class="col-span-12">                                    
                                <x-form.form-label for="email" value="Email"/>
                                <x-form.form-input value="{{ $db->email }}" disabled />
                            </div>
                            <div class="col-span-12">
                                <x-form.form-label for="password_current" value="Senha Atual"/>
                                <x-form.form-input type="password" name="password_current" placeholder="**********" required />
                                <x-form.error-message for="password_current" />
                            </div>
                            <div class="col-span-6">
                                <x-form.form-label for="password" value="Nova Senha"/>
                                <x-form.form-input type="password" name="password" placeholder="**********" required />
                                <x-form.error-message for="password" />
                            </div>
                            <div class="col-span-6">
                                <x-form.form-label for="password_confirmation" value="Confirme Nova Senha"/>
                                <x-form.form-input type="password" name="password_confirmation" placeholder="**********" required />
                                <x-form.error-message for="password_confirmation" />
                            </div>
                        </x-form.form-group>

                        <x-button.btn-primary value="Salvar Alteração"/>
                    </form>
                </x-conteiner>
            </div>
        </div>
    @endslot
</x-pages.index>