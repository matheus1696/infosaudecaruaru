<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitação Nº: {{$db->code}}"
            routeBack="{{route('warehouse_centers.requestShow',['warehouse_center'=>$dbDepartment->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.warehouse.request.partials.edit.request_description')
        </x-conteiner>
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
        @include('inventory.warehouse.request.partials.edit.request_table')
    @endslot
</x-pages.index>