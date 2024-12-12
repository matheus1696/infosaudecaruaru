<!-- Inicio de Componentização da Página Index -->
<x-pages.index>
    @slot('body')
        <div class="flex justify-center items-center min-h-96 md:mt-20">
            <div class="w-full md:w-2/4 xl:w-2/3">
                <!-- Inicio de Componentização do Conteiner -->
                <x-conteiner>
                    <h3 class="mb-3 text-lg font-semibold text-center">Dados do Profissionais</h3>

                    <x-form.form-erros />

                    <form action="{{route('profiles.updateProfessional')}}" method="post">
                        @csrf @method('PUT')

                        <x-form.form-group>
                            <div class="col-span-12">
                                <x-form.form-label for="matriculation" value="Matricula"/>
                                <x-form.form-input name="matriculation" value="{{ old('matriculation') ?? $db->matriculation }}" placeholder="99.999-2" maxlength="8" minlength="8" required />
                                <x-form.error-message for="matriculation" />
                            </div>
                            <div class="col-span-12">                                    
                                <x-form.form-label for="establishment" value="Unidade de Lotação"/>
                                <x-form.form-input value="{{ $db->CompanyEstablishment->title ?? 'Sem vínculo' }}" disabled />
                            </div>
                            <div class="col-span-12">                                    
                                <x-form.form-label for="establishmentDepartment" value="Departamento"/>
                                <x-form.form-input value="{{ $db->CompanyEstablishmentDepartment->title ?? 'Sem vínculo' }}" disabled />
                            </div>
                            <div class="col-span-12">                                    
                                <x-form.form-label for="companyOccupation" value="Cargo"/>
                                <x-form.form-input value="{{ $db->CompanyOccupation->title ?? 'Sem vínculo' }}" disabled />
                            </div>
                        </x-form.form-group>

                        <x-button.btn-primary value="Salvar Alteração"/>
                    </form>
                </x-conteiner>
            </div>
        </div>
    @endslot
</x-pages.index>