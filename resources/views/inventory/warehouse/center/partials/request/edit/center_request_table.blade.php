<div class="flex flex-col items-center justify-end col-span-12 gap-1 mb-2 md:flex-row">    
    <h3 class="flex-1 col-span-12 px-3 text-lg font-semibold">Lista de Itens Solicitados</h3>

    <div class="flex">
        @if ($db->status == 'Aberto')
        
            <!-- Confirmar Entrega do Pedido -->
            <div class="inline-block">
                <form action="{{route('warehouse_centers.requestCheckInventory',['warehouse_center'=>$dbDepartment->id,'request'=>$db->id])}}" method="post" class="d-inline-block">
                    @csrf
                    <button
                        type="submit"
                        class="px-2 py-1 m-1 text-xs text-white bg-yellow-700 rounded-lg shadow-md hover:bg-yellow-900"
                    >
                        <i class="fas fa-sync-alt"></i>
                        <span class="ml-1 font-semibold">Verificar Estoque</span>
                    </button>
                </form>
            </div>

            <!-- Confirmar Entrega do Pedido -->
            <div class="inline-block">
                <form action="{{route('warehouse_centers.requestConfirmedAll',['warehouse_center'=>$dbDepartment->id,'request'=>$db->id])}}" method="post" class="d-inline-block">
                    @csrf @method('PUT')
                    <button
                        type="submit"
                        class="px-2 py-1 m-1 text-xs text-white bg-green-700 rounded-lg shadow-md hover:bg-green-900"
                        onclick="return confirm('Realmente deseja confirmar o envio da solicitação para unidade?')"
                    >
                        <i class="fas fa-check"></i>
                        <span class="ml-1 font-semibold">Confirmar Envio</span>
                    </button>
                </form>
            </div>
            
        @endif
    </div>
</div>

<x-table.table :db="$dbRequestDetails">
    @slot('thead')
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-32">Estoque</x-table.th>
        <x-table.th class="w-32">Estoque Solicitante</x-table.th>
        <x-table.th class="w-32">Qtd. Solicitada</x-table.th>
        <x-table.th class="w-32">Qtd. Envio</x-table.th>
        @if ($db->status == 'Aberto')
            <x-table.th class="w-32">Status</x-table.th>
            <x-table.th class="w-28"></x-table.th> 
        @else
            <x-table.th class="w-48"></x-table.th> 
        @endif
    @endslot

    @slot('tbody')
        @foreach ($dbRequestDetails as $dbRequestDetail)
            <x-table.tr>
                <x-table.td>{{$dbRequestDetail->Consumable->title}}</x-table.td>
                <x-table.td class="bg-sky-100">
                    @foreach ($dbInventories as $dbInventory)
                        @if ($dbInventory->consumable_id === $dbRequestDetail->consumable_id)
                            {{$dbInventory->quantity}}
                            @break
                        @endif
                    @endforeach
                </x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity_current}}</x-table.td>
                <x-table.td>{{$dbRequestDetail->quantity}}</x-table.td>
                <x-table.td class="bg-yellow-100">{{$dbRequestDetail->quantity_forwarded}}</x-table.td>
                
                @if ($db->status == 'Aberto')
                    <x-table.td>
                        <x-button.buttonStatus condition="{{$dbRequestDetail->confirmed}}" route="{{route('warehouse_centers.requestConfirmedItem',['request'=>$dbRequestDetail->id])}}" titleTrue="Confimado" titleFalse="Negado"/>
                    </x-table.td>   

                    <x-table.td>
                        <x-button.minButtonModalEdit id="requestDetails_{{$dbRequestDetail->id}}" title="Alterar quantidade da solicitação do suprimento">
                            <x-form.form method="edit" route="{{route('warehouse_centers.requestUpdate',['warehouse_center'=>$dbDepartment->id,'request'=>$db->id])}}" title="Alterar Quantidade de Envio" color="sky">
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
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>