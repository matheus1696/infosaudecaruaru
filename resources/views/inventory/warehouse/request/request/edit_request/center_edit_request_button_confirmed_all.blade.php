<!-- Confirmar Entrega do Pedido -->
<div class="inline-block">
    <a 
        href="{{route('warehouse.centers.requestConfirmedAll',['center'=>$dbDepartment->id,'request'=>$db->id])}}"
        class="px-2 py-1 m-1 text-xs text-white bg-green-700 rounded-lg shadow-md hover:bg-green-900"
        onclick="return confirm('Realmente deseja confirmar o envio da solicitação para unidade?')"
    >
        <i class="fas fa-check"></i>
        <span class="ml-1 font-semibold">Confirmar Envio</span>
    </a>
</div>