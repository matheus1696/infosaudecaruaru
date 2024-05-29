<!-- Inicio de Componentização da Tabela -->
<x-table.table :db="$db">

    <!-- Inicio Slot THead -->
    @slot('thead')
        <x-table.th>Nome</x-table.th>
        <x-table.th>E-mail</x-table.th>
        <x-table.th class="w-28">Verificação</x-table.th>
        <x-table.th class="w-40"></x-table.th>
    @endslot

    <!-- Inicio Slot TBody -->
    @slot('tbody')
        @foreach ($db as $item)
            @if ($item->id != 1)
                @if (Auth::User()->id != $item->id)
                <x-table.tr>
                    <x-table.td>{{$item->name}}</x-table.td>
                    <x-table.td>{{$item->email}}</x-table.td>
                    <x-table.td>
                        <span 
                            class="px-2 py-1 text-xs font-semibold text-white bg-{{$item->email_verified_at ? 'green' : 'yellow' }}-700 rounded-lg shadow-md"
                        >
                            {{$item->email_verified_at ? "Verificado" : "Aguardando"}}
                        </span>
                    </x-table.td>

                    <x-table.td>
                        <!-- Inicio de Componentização do ModalShow -->
                        <x-button.minButtonModalEdit id="UserModal{{$item->id}}" title="Dados do Perfil">
                            <div class="grid grid-cols-1 gap-3 mb-3 -mt-5 md:grid-cols-2">
                                <p><strong>Nome: </strong>{{$item->name}}</p>
                                <p><strong>Email: </strong>{{$item->email}}</p>
                                <p><strong>Data de Nascimento: </strong>@if($item->birthday)
                                    {{date('d/m/Y',strtotime($item->birthday))}} @endif
                                </p>
                                <p><strong>Sexo: </strong>{{$item->SexualOrientations->sex ?? ""}}</p>
                                <p><strong>Contato: </strong>{{$item->contact_1}}</p>
                                <p><strong>Contato: </strong>{{$item->contact_2}}</p>
                            </div>
                            <hr>
                            <div class="mt-3">
                                <!-- Inicio de Componentização de Formulário -->
                                <x-form.form method="edit" route="{{route('users.update',['user'=>$item->id])}}">

                                    <!-- Inicio de Componentização de Select -->
                                    <x-form.select col="12" label="Setor" name="company_id" id="company_id_{{$item}}">
                                        @foreach ($dbCompanyOrganizational as $dbCompanyOrganization)
                                            <option 
                                                value="{{$dbCompanyOrganization->id}}" 
                                                @if ($item->company_id == $dbCompanyOrganization->id) selected @endif>
                                                    @for ($i = 0; $i < $dbCompanyOrganization->number_hierarchy; $i++) <span> - </span> @endfor
                                                    {{$dbCompanyOrganization->acronym}} - {{$dbCompanyOrganization->title}}
                                            </option>
                                        @endforeach
                                    </x-form.select>

                                    <!-- Inicio de Componentização de Select -->
                                    <x-form.select col="12" label="Cargo" name="occupation_id" id="occupation_id_{{$item}}">
                                        @foreach ($dbCompanyOccupations as $dbCompanyOccupation)
                                            <option
                                                value="{{$dbCompanyOccupation->id}}"
                                                @if ($item->occupation_id == $dbCompanyOccupation->id) selected @endif>
                                                    {{$dbCompanyOccupation->code}} - {{$dbCompanyOccupation->title}}
                                            </option>
                                        @endforeach
                                    </x-form.select>

                                    <!-- Inicio de Componentização de Select -->
                                    <x-form.select col="12" label="Estabelecimento" name="establishment_id" id="establishment_id_{{$item}}">
                                        @foreach ($dbEstablishments as $dbEstablishment)
                                            <option 
                                                value="{{$dbEstablishment->id}}"
                                                @if ($item->establishment_id == $dbEstablishment->id) selected @endif>
                                                    {{$dbEstablishment->title}}
                                            </option>
                                        @endforeach
                                    </x-form.select>
                                </x-form.form>
                            </div>
                            
                            <div class="grid items-center grid-cols-1 gap-3 -my-5 md:grid-cols-2 md:-my-10">
                                <a href="{{route('users.verify',['user'=>$item->id])}}" class="w-full">
                                    <div class="w-full py-2 text-sm text-center text-white transition duration-300 bg-gray-600 rounded-lg shadow-md hover:bg-gray-700">
                                        Solicitar Verificação de Conta
                                    </div>
                                </a>
    
                                <div class="w-full -mt-8 md:mt-0">
                                    <x-form.form method="create" route="{{route('password.email')}}" title="Enviar Recuperação de Senha">
                                        {{-- Email field --}}
                                        <div class="input-group"><input type="email" name="email" value="{{$item->email}}" hidden></div>
                                    </x-form.form>
                                </div>
                            </div>

                            
                            
                        </x-button.minButtonModalEdit>

                        <!-- Inicio de Componentização do Modal Permissões -->
                        <x-button.minButtonModalUserPermission id="UserPermissionModal{{$item->id}}" title="Permissões">

                            <x-form.form method="edit" route="{{route('users.permission',['user'=>$item->id])}}">
                                @csrf @method('PUT')
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 col-span-12 gap-3">
                                        @foreach ($dbPermissions as $permission)
                                            <div>
                                                <input type="checkbox" id="permission_{{$permission->id}}" name={{$permission->name}} value="{{$permission->id}}"
                                                    @foreach ($dbHasPermissions as $hasPermission)
                                                        @if ($hasPermission->permission_id == $permission->id)
                                                            @if ($item->id == $hasPermission->model_id)
                                                                checked
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                >
                                                <label for="permission_{{$permission->id}}">{{$permission->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                            </x-form.form>
                        </x-button.minButtonModalUserPermission>
                    </x-table.td>
                </x-table.tr>
                @endif
            @endif
        @endforeach
    @endslot

</x-table.table>