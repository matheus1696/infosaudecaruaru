<div class="my-3">
    <x-table.table>
        @slot('thead')
            <x-table.th>Setor</x-table.th>
            <x-table.th class="w-32">Telefone</x-table.th>
            <x-table.th class="w-28">Ramal</x-table.th>
            <x-table.th class="w-32">Tipo de contato</x-table.th>
            <x-table.th class="w-24">Estoque</x-table.th>
            <x-table.th class="w-24">C.D.S.<sup class="text-gray-600">*1</sup></x-table.th>
            <x-table.th class="w-24">Farmácia</x-table.th>
            <x-table.th class="w-24">C.A.F.<sup class="text-gray-600">*2</sup></x-table.th>
            <x-table.th class="w-24">Alimentos</x-table.th>
            <x-table.th class="w-24">C.D.G.A.<sup class="text-gray-600">*3</sup></x-table.th>
            <x-table.th class="w-32"></x-table.th>
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
                        <x-button.buttonStatus condition="{{$dbDepartment->has_inventory_warehouse_store_room}}" name="has_inventory_warehouse_store_room" route="{{route('establishment_departments.hasInventory',['establishment_department'=>$dbDepartment->id])}}" />
                    </x-table.td>                     
                    <x-table.td>
                        <x-button.buttonStatus condition="{{$dbDepartment->has_inventory_warehouse_center}}" name="has_inventory_warehouse_center" route="{{route('establishment_departments.hasInventory',['establishment_department'=>$dbDepartment->id])}}" />
                    </x-table.td>                  
                    <x-table.td>
                        <x-button.buttonStatus condition="{{$dbDepartment->has_inventory_pharmacy_store_room}}" name="has_inventory_pharmacy_store_room" route="{{route('establishment_departments.hasInventory',['establishment_department'=>$dbDepartment->id])}}" />
                    </x-table.td>                  
                    <x-table.td>
                        <x-button.buttonStatus condition="{{$dbDepartment->has_inventory_pharmacy_center}}" name="has_inventory_pharmacy_center" route="{{route('establishment_departments.hasInventory',['establishment_department'=>$dbDepartment->id])}}" />
                    </x-table.td>                 
                    <x-table.td>
                        <x-button.buttonStatus condition="{{$dbDepartment->has_inventory_foodstuff_store_room}}" name="has_inventory_foodstuff_store_room" route="{{route('establishment_departments.hasInventory',['establishment_department'=>$dbDepartment->id])}}" />
                    </x-table.td>                  
                    <x-table.td>
                        <x-button.buttonStatus condition="{{$dbDepartment->has_inventory_foodstuff_center}}" name="has_inventory_foodstuff_center" route="{{route('establishment_departments.hasInventory',['establishment_department'=>$dbDepartment->id])}}" />
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
    <div>
        <p class="py-2 text-xs text-center text-gray-400">
            <sup>*1</sup> C.D.S: Centro de Distribuição de Suprimentos, 
            <sup>*2</sup> C.A.F. Centro de Distribuição Farmacêutica, 
            <sup>*3</sup> C.D.G.A Centro de Distribuição de Gêneros Alimentícios
        </p>
    </div>
</div>