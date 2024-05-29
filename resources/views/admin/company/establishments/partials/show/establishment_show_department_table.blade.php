<div class="my-3">
    <x-table.table>
        @slot('thead')
            <x-table.th>Setor</x-table.th>
            <x-table.th class="w-32">Telefone</x-table.th>
            <x-table.th class="w-28">Ramal</x-table.th>
            <x-table.th class="w-32">Tipo de contato</x-table.th>
            <x-table.th class="w-32">Almoxarifado</x-table.th>
            <x-table.th class="w-32">Centro de Distribuição</x-table.th>
            <x-table.th class="w-32">Farmácia</x-table.th>
            <x-table.th class="w-32">CAF</x-table.th>
            <x-table.th class="w-28"></x-table.th>
        @endslot
    
        @slot('tbody')
            @foreach ($dbDepartments as $dbDepartment)
                <x-table.tr>
                    <x-table.td>{{$dbDepartment->department}}</x-table.td>
                    <x-table.td class="text-center">{{$dbDepartment->contact}}</x-table.td>
                    <x-table.td class="text-center">{{$dbDepartment->extension}}</x-table.td>
                    <x-table.td class="text-center">                        
                        @if($dbDepartment->type_contact == "Without") Sem Ramal @endif
                        @if($dbDepartment->type_contact == "Main") Contato Externo @endif
                        @if($dbDepartment->type_contact == "Internal") Ramal Interno @endif
                    </x-table.td>                    
                    <x-table.td>
                        <x-button.buttonStatus condition="{{$dbDepartment->has_inventory_warehouse}}" name="has_inventory_warehouse" route="{{route('establishment_departments.hasInventory',['establishment_department'=>$dbDepartment->id])}}" />
                    </x-table.td>                     
                    <x-table.td>
                        <x-button.buttonStatus condition="{{$dbDepartment->has_inventory_warehouse_center}}" name="has_inventory_warehouse_center" route="{{route('establishment_departments.hasInventory',['establishment_department'=>$dbDepartment->id])}}" />
                    </x-table.td>                  
                    <x-table.td>
                        <x-button.buttonStatus condition="{{$dbDepartment->has_inventory_pharmacy}}" name="has_inventory_pharmacy" route="{{route('establishment_departments.hasInventory',['establishment_department'=>$dbDepartment->id])}}" />
                    </x-table.td>                  
                    <x-table.td>
                        <x-button.buttonStatus condition="{{$dbDepartment->has_inventory_pharmacy_center}}" name="has_inventory_pharmacy_center" route="{{route('establishment_departments.hasInventory',['establishment_department'=>$dbDepartment->id])}}" />
                    </x-table.td> 
                    <x-table.td class="text-center">
                        
                        <x-button.minButtonModalEdit id="Departamento{{$dbDepartment->id}}" title="{{$dbDepartment->department}}">

                            <x-form.form route="{{route('establishment_departments.update',['establishment_department'=>$dbDepartment->id])}}" method="edit">
                                
                                <x-form.input col="4" label="Departamento" id="department_{{$dbDepartment->id}}" name="department" value="{{ $dbDepartment->department}}" required="required"/>
                                <x-form.input col="3" type="tel" label="Telefone" id="contact_{{$dbDepartment->id}}" name="contact" value="{{ $dbDepartment->contact}}" required="required"/>
                                <x-form.input col="2" type="number" label="Ramal" id="extension_{{$dbDepartment->id}}" name="extension" value="{{ $dbDepartment->extension}}" required="required"/>
                                
                                <x-form.select col="3" label="Tipo de Contato" id="type_contact_{{$dbDepartment->id}}" name="type_contact">
                                    <option @if($dbDepartment->type_contact === "Without") selected @endif value="Without">Sem Ramal</option>
                                    <option @if($dbDepartment->type_contact === "Main") selected @endif value="Main">Contato Externo</option>
                                    <option @if($dbDepartment->type_contact === "Internal") selected @endif value="Internal">Ramal Interno</option>
                                </x-form.select>
                                
                            </x-form.form>
                            
                        </x-button.minButtonModalEdit>

                        <x-button.minButtonDelete route="{{route('establishment_departments.destroy',['establishment_department'=>$dbDepartment->id])}}"></x-button.minButtonDelete>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot
    </x-table.table>
</div>