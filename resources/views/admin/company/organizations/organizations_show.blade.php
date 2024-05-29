<x-pages.index>
    
    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Organigrama: {{ $db->title }} ({{$db->linked_users}})" 
            routeBack="{{ route('organizations.index') }}"
        />
    @endslot

    <!-- Slot Body -->
    @slot('body')

        <x-conteiner>
            <div>
                <x-form.form method="create" route="{{route('organization_linked_users.store')}}">
                    <input type="hidden" name="organization_id" value="{{$db->id}}">
                
                    <x-form.select col="12" label="Usuário" id="user_id" name="user_id">
                        @foreach ($dbUsers as $dbUser)
                            <option value="{{$dbUser->id}}">
                                {{$dbUser->name}} 
                                @isset ($dbUser->CompanyOrganization->acronym)
                                    | {{$dbUser->CompanyOrganization->acronym}} - {{$dbUser->CompanyOrganization->title}}
                                @endisset
                            </option>                           
                        @endforeach
                    </x-form.select>
                </x-form.form>
            </div>
        </x-conteiner>

        <hr>
        
        <div class="mt-3">
            <x-table.table>

                @slot('thead')
                    <x-table.th>Usuários Vinculados</x-table.th>
                    <x-table.th class="w-40"></x-table.th>
                @endslot

                @slot('tbody')
                    @foreach ($dbLinkedUsers as $dbLinkedUser)
                        <x-table.tr>
                            <x-table.td>{{$dbLinkedUser->name}}</x-table.td>
                            <x-table.td>
                                <x-button.minButtonDelete route="{{route('organization_linked_users.destroy',['organization_linked_user'=>$dbLinkedUser->id])}}" />
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                @endslot    

            </x-table.table>
        </div>

    @endslot
</x-pages.index>