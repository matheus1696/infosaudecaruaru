<div class="my-3">
    <x-table.table color="orange">
        @slot('thead')
            <x-table.th>Descrição do Almoxarifado</x-table.th>
            <x-table.th class="w-80">Tipo de Almoxarifado</x-table.th>
            <x-table.th class="w-32">Status</x-table.th>
            <x-table.th class="w-32"></x-table.th>
        @endslot
    
        @slot('tbody')
            @foreach ($dbEstablishmentWarehouses as $dbEstablishmentWarehouse)
                <x-table.tr>
                    <x-table.td>{{$dbEstablishmentWarehouse->title}}</x-table.td>
                    <x-table.td>{{$dbEstablishmentWarehouse->CompanyEstablishmentWarehouseType->title}}</x-table.td>
                    <x-table.td class="text-center">
                        <x-button.buttonStatus condition="{{$dbEstablishmentWarehouse->status}}" route="{{route('establishments.statusWarehouse',['warehouse'=>$dbEstablishmentWarehouse->id])}}" name="status" />
                    </x-table.td>
                    <x-table.td class="text-center">
                        
                        <x-button.minButtonModalEdit id="Warehouse_{{$dbEstablishmentWarehouse->id}}" title="{{$dbEstablishmentWarehouse->title}}">
                            <x-form.form method="edit" route="{{route('establishments.updateWarehouse',['warehouse'=>$dbEstablishmentWarehouse->id])}}">
                                <x-form.input col="12" label="Descrição do Almoxarifado" id="title" name="title" required="required" value="{{$dbEstablishmentWarehouse->title}}"/>
        
                                <x-form.select col="12" label="Tipo de Almoxarifado" id="type_warehouse_id_{{$dbEstablishmentWarehouse->acronym}}_{{$dbEstablishmentWarehouse->id}}" name="type_warehouse_id">
                                    @foreach ($dbEstablishmentTypeWarehouses as $dbEstablishmentTypeWarehouse)
                                        <option value="{{$dbEstablishmentTypeWarehouse->id}}" @isset($db) @if ($dbEstablishmentWarehouse->type_warehouse_id == $dbEstablishmentTypeWarehouse->id) selected @endif @endisset>
                                            {{$dbEstablishmentTypeWarehouse->title}}
                                        </option>
                                    @endforeach
                                </x-form.select>
                            </x-form.form>                            
                        </x-button.minButtonModalEdit>

                        <x-button.minButtonDelete route="{{route('establishments.destroyWarehouse',['warehouse'=>$dbEstablishmentWarehouse->id])}}"/>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot
    </x-table.table>
</div>