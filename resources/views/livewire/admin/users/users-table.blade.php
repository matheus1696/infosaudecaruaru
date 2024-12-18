<div>
    <x-table.table :paginate="$dbUsers">
        @slot('search')
            <div class="flex justify-between gap-2 py-3">
                <div class="w-44 md:w-32">
                    <x-form.form-select wire:model.live="perPage">
                        <option value="10" selected>10 por página</option>
                        <option value="20">20 por página</option>
                        <option value="30">30 por página</option>
                        <option value="40">40 por página</option>
                        <option value="50">50 por página</option>
                    </x-form.form-select>
                </div>

                <div class="w-full md:w-80">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Pesquisar nome ou email" />
                </div>
            </div>
        @endslot
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th>Nome</x-table.th>
            <x-table.th>E-mail</x-table.th>
            <x-table.th class="w-28 hidden md:table-cell">Verificação</x-table.th>
            <x-table.th class="w-28"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbUsers as $item)
                <x-table.tr>
                    <x-table.td>{{ $item->name }}</x-table.td>
                    <x-table.td>{{ $item->email }}</x-table.td>
                    <x-table.td class="hidden md:table-cell">
                        <span
                            class="px-2 py-1 text-xs font-semibold text-white bg-{{ $item->email_verified_at ? 'green' : 'yellow' }}-700 rounded-lg shadow-md">
                            {{ $item->email_verified_at ? 'Verificado' : 'Aguardando' }}
                        </span>
                    </x-table.td>

                    <x-table.td>
                        <!-- Modal Detalhamento dos Dados do Perfil -->
                        <x-modal.modal id="UserModal{{ $item->id }}" title="Dados do Perfil" icon="fas fa-pen"
                            class="bg-yellow-400">
                            <div class="grid grid-cols-1 gap-3 mb-3 md:grid-cols-2">
                                <p><strong>Nome: </strong>{{ $item->name }}</p>
                                <p><strong>Email: </strong>{{ $item->email }}</p>
                                <p><strong>Data de Nascimento: </strong>
                                    @if ($item->birthday)
                                        {{ date('d/m/Y', strtotime($item->birthday)) }}
                                    @endif
                                </p>
                                <p><strong>Sexo: </strong>{{ $item->SexualOrientations->sex ?? '' }}</p>
                                <p><strong>Contato: </strong>{{ $item->contact_1 }}</p>
                                <p><strong>Contato: </strong>{{ $item->contact_2 }}</p>
                            </div>
                            <hr>
                            <div class="py-3">
                                <form action="{{ route('users.update', ['user' => $item->id]) }}" method="post">
                                    @csrf @method('PUT')
                                    <x-form.form-group>
                                        <div class="col-span-12">
                                            <x-form.form-label for="organization_id" value="Setor" />
                                            <x-form.form-select name="organization_id">
                                                @foreach ($dbCompanyOrganizational as $dbCompanyOrganization)
                                                    <option class="hover:bg-green-600"
                                                        value="{{ $dbCompanyOrganization->id }}"
                                                        @if ($item->organization_id == $dbCompanyOrganization->id) selected @endif>
                                                        {{ $dbCompanyOrganization->acronym }} -
                                                        {{ $dbCompanyOrganization->title }}
                                                    </option>
                                                @endforeach
                                            </x-form.form-select>
                                            <x-form.error-message for="organization_id" />
                                        </div>

                                        <div class="col-span-12">
                                            <x-form.form-label for="occupation_id" value="Cargo" />
                                            <x-form.form-select name="occupation_id">
                                                @foreach ($dbCompanyOccupations as $dbCompanyOccupation)
                                                    <option class="hover:bg-green-600"
                                                        value="{{ $dbCompanyOccupation->id }}"
                                                        @if ($item->occupation_id == $dbCompanyOccupation->id) selected @endif>
                                                        {{ $dbCompanyOccupation->acronym }} -
                                                        {{ $dbCompanyOccupation->title }}
                                                    </option>
                                                @endforeach
                                            </x-form.form-select>
                                            <x-form.error-message for="occupation_id" />
                                        </div>

                                        <div class="col-span-12">
                                            <x-form.form-label for="establishment_id" value="Estabelecimento" />
                                            <x-form.form-select name="establishment_id">
                                                @foreach ($dbEstablishments as $dbEstablishment)
                                                    <option class="hover:bg-green-600" value="{{ $dbEstablishment->id }}"
                                                        @if ($item->establishment_id == $dbEstablishment->id) selected @endif>
                                                        {{ $dbEstablishment->title }}
                                                    </option>
                                                @endforeach
                                            </x-form.form-select>
                                            <x-form.error-message for="establishment_id" />
                                        </div>
                                    </x-form.form-group>

                                    <x-button.btn-primary value="Salvar Alteração" />
                                </form>
                            </div>

                            <hr class="pb-3">

                            <div class="grid items-center grid-cols-1 gap-3 md:grid-cols-2">
                                <x-button.link-secondary value="Solicitar Verificação de Conta"
                                    href="{{ route('users.verify', ['user' => $item->id]) }}" class="w-full" />

                                <form action="{{ route('password.email') }}" method="post">
                                    @csrf
                                    <input name="email" value="{{ $item->email }}" hidden />
                                    <x-button.btn-tertiary value="Enviar Recuperação de Senha" />
                                </form>
                            </div>
                        </x-modal.modal>

                        <!-- Modal Permissões -->
                        <x-modal.modal id="UserPermissionModal{{ $item->id }}" title="Permissões" icon="fas fa-lock"
                            class="bg-yellow-400">

                            <form action="{{ route('users.permission', ['user' => $item->id]) }}" method="post">
                                @csrf @method('PUT')

                                <x-form.form-group>
                                    @foreach ($dbPermissions as $permission)
                                        <div class="col-span-6 md:col-span-4 flex items-center gap-2">
                                            <input type="checkbox" id="permission_{{ $permission->id }}"
                                                name="permissions[]" value="{{ $permission->id }}" class="hidden peer"
                                                {{ $item->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                            <label for="permission_{{ $permission->id }}"
                                                class="flex items-center justify-center w-full px-3 py-1 text-sm font-medium text-gray-700 border rounded-lg cursor-pointer peer-checked:bg-green-700 peer-checked:text-white peer-checked:border-green-700 hover:border-green-700">
                                                {{ $permission->translator }}
                                            </label>
                                        </div>
                                    @endforeach
                                </x-form.form-group>

                                <x-button.btn-secondary value="Alterar Permissões" />
                            </form>

                        </x-modal.modal>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
