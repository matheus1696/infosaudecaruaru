<div class="my-3">
    <x-table.table>
        @slot('thead')
            <x-table.th>Setor</x-table.th>
            <x-table.th class="w-32">Telefone</x-table.th>
            <x-table.th class="w-28">Ramal</x-table.th>
            <x-table.th class="w-32">Tipo de contato</x-table.th>
            <x-table.th class="w-32"></x-table.th>
        @endslot
    
        @slot('tbody')
            @foreach ($dbDepartments as $dbDepartment)
                <x-table.tr>
                    <x-table.td>{{$dbDepartment->title}}</x-table.td>
                    <x-table.td class="text-center">{{$dbDepartment->contact}}</x-table.td>
                    <x-table.td class="text-center">{{$dbDepartment->extension}}</x-table.td>
                    <x-table.td class="text-center">                        
                        @if($dbDepartment->type_contact == "Without") Sem Ramal @endif
                        @if($dbDepartment->type_contact == "Main") Contato Externo @endif
                        @if($dbDepartment->type_contact == "Internal") Ramal Interno @endif
                    </x-table.td>
                    <x-table.td class="text-center">
                        
                        <x-button.minButtonModalEdit id="Departamento{{$dbDepartment->id}}" title="{{$dbDepartment->department}}">

                            <x-form.form route="{{route('establishment_departments.update',['establishment_department'=>$dbDepartment->id])}}" method="edit">
                                
                                <x-form.input col="4" label="Departamento" id="department_{{$dbDepartment->id}}" name="title" value="{{ $dbDepartment->title}}" required="required"/>
                                <x-form.input col="3" type="tel" label="Telefone" id="contact_{{$dbDepartment->id}}" name="contact" value="{{ $dbDepartment->contact}}" required="required"/>
                                <x-form.input col="2" type="number" label="Ramal" id="extension_{{$dbDepartment->id}}" name="extension" value="{{ $dbDepartment->extension}}" required="required"/>
                                
                                <x-form.select col="3" label="Tipo de Contato" id="type_contact_{{$dbDepartment->id}}" name="type_contact">
                                    <option @if($dbDepartment->type_contact === "Without") selected @endif value="Without">Sem Ramal</option>
                                    <option @if($dbDepartment->type_contact === "Main") selected @endif value="Main">Contato Externo</option>
                                    <option @if($dbDepartment->type_contact === "Internal") selected @endif value="Internal">Ramal Interno</option>
                                </x-form.select>
                                
                            </x-form.form>
                            
                        </x-button.minButtonModalEdit>

                        <x-button.minButtonDelete route="{{route('establishment_departments.destroy',['establishment_department'=>$dbDepartment->id])}}"/>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot
    </x-table.table>
</div>