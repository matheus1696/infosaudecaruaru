<div class="my-3">
    <x-table.table color="orange">
        @slot('thead')
            <x-table.th>Almoxarifado</x-table.th>
            <x-table.th class="w-32">Status</x-table.th>
            <x-table.th class="w-32"></x-table.th>
        @endslot
    
        @slot('tbody')
            @foreach ($dbWarehouses as $dbWarehouse)
                <x-table.tr>
                    <x-table.td>{{$dbWarehouse->title}}</x-table.td>
                    <x-table.td class="text-center">{{$dbWarehouse->status}}</x-table.td>
                    <x-table.td class="text-center">                        
                        <x-button.minButtonModalEdit id="Departamento{{$dbWarehouse->id}}" title="{{$dbWarehouse->department}}">                            
                            <x-form.form method="create" route="{{route('establishment_departments.store')}}">
                                <input type="hidden" id="establishment_id" name="establishment_id" value="{{$db->id}}">
                                <x-form.input col="12" label="Título" id="title" name="title" required="required"/>
                            </x-form.form>                            
                        </x-button.minButtonModalEdit>

                        <x-button.minButtonDelete route="{{route('establishment_departments.destroy',['establishment_department'=>$dbWarehouse->id])}}"/>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot
    </x-table.table>
</div>