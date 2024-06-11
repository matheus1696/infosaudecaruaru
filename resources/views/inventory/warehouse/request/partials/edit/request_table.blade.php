<x-table.table :db="$dbRequestDetails">
    @slot('thead')
        <x-table.th>Suprimentos</x-table.th>
        @isset($dbInventories)            
            <x-table.th class="w-32">Estoque</x-table.th>
        @endisset
        <x-table.th class="w-32">Estoque Solicitante</x-table.th>
        <x-table.th class="w-32">Qtd. Solicitada</x-table.th>
        <x-table.th class="w-32">Qtd. Envio</x-table.th>
        @canany(['inventory_warehouse_center'])
            @if ($db->status == 'Aberto')
                <x-table.th class="w-32">Status</x-table.th>
                <x-table.th class="w-28"></x-table.th> 
            @else
                <x-table.th class="w-48"></x-table.th> 
            @endif
        @endcanany
        @canany(['inventory_warehouse_store_room'])
            <x-table.th class="w-48"></x-table.th> 
        @endcanany
    @endslot

    @slot('tbody')
        @foreach ($dbRequestDetails as $dbRequestDetail)
            <x-table.tr>
                <x-table.td>{{$dbRequestDetail->Consumable->title}}</x-table.td>
                @isset ($dbInventories)
                    <x-table.td class="bg-sky-100">
                        @foreach ($dbInventories as $dbInventory)
                            @if ($dbInventory->consumable_id === $dbRequestDetail->consumable_id)
                                @if ($dbInventory->quantity == 0 || $dbInventory->quantity < 0)
                                    {{$dbInventory->quantity}}
                                @else
                                    0
                                @endif                                
                                @break
                            @endif
                        @endforeach
                    </x-table.td>
                @endisset
                <x-table.td>{{$dbRequestDetail->quantity_current}}</x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity}}</x-table.td>
                <x-table.td class="bg-yellow-100">{{$dbRequestDetail->quantity_forwarded}}</x-table.td>                
                
                @canany(['inventory_warehouse_center'])
                    @if ($db->status == 'Aberto')
                        <x-table.td>
                            <x-button.buttonStatus condition="{{$dbRequestDetail->confirmed}}" route="{{route('warehouse_centers.requestConfirmedItem',['request'=>$dbRequestDetail->id])}}" titleTrue="Confimado" titleFalse="Negado"/>
                        </x-table.td>   

                        <x-table.td>
                            <x-button.minButtonModalEdit id="requestDetails_{{$dbRequestDetail->id}}" title="Alterar quantidade da solicitação do suprimento">
                                <x-form.form method="edit" route="{{route('requests.update',['warehouse'=>$dbDepartment->id,'request'=>$db->id])}}" title="Alterar Quantidade de Envio" color="sky">
                                    <input hidden id="consumableEdit" name="consumableEdit" value="{{$dbRequestDetail->consumable_id}}">
                                    <x-form.input col="9" label="Suprimentos" name="disabled" value="{{$dbRequestDetail->Consumable->title}}" disabled="disabled"/>
                                    <x-form.input col="3" type="number" label="Quantidade" id="quantityEdit" name="quantityEdit" min="1" value="{{$dbRequestDetail->quantity_forwarded}}"/>
                                </x-form.form>
                            </x-button.minButtonModalEdit>
                        </x-table.td> 
                    @else
                        @if ($dbRequestDetail->confirmed)
                            <x-table.td class="bg-green-600 text-white text-xs font-semibold">Liberado para Entrega</x-table.td>
                        @else                        
                            <x-table.td class="bg-red-600 text-white text-xs font-semibold">Sem estoque no momento</x-table.td>
                        @endif
                    @endif
                @endcanany

                @canany(['inventory_warehouse_store_room'])  
                    @if ($db->status == 'Aberto')                                          
                        <x-table.td>
                            <x-button.minButtonModalEdit id="requestDetails_{{$dbRequestDetail->id}}" title="Alterar quantidade da solicitação do suprimento">
                                <x-form.form method="edit" route="{{route('requests.update',['warehouse'=>$db->department_id,'request'=>$db->id])}}" title="Alterar Quantidade" color="sky">
                                    <input hidden id="consumableEdit" name="consumableEdit" value="{{$dbRequestDetail->consumable_id}}">
                                    <x-form.input col="9" label="Suprimentos" name="disabled" value="{{$dbRequestDetail->Consumable->title}}" disabled="disabled"/>
                                    <x-form.input col="3" type="number" label="Quantidade" id="quantityEdit" name="quantityEdit" min="1" value="{{$dbRequestDetail->quantity}}"/>

                                </x-form.form>
                            </x-button.minButtonModalEdit>
                            <x-button.minButtonDelete route="{{route('store_rooms.requestDelete',['request'=>$dbRequestDetail->id])}}" />
                        </x-table.td>
                    @else
                        @if ($dbRequestDetail->confirmed)
                            <x-table.td class="bg-green-600 text-white text-xs font-semibold">Liberado para Entrega</x-table.td>
                        @else                        
                            <x-table.td class="bg-red-600 text-white text-xs font-semibold">Sem estoque no momento</x-table.td>
                        @endif
                    @endif
                @endcanany

            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>