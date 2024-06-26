<!-- Confirmar Entrega do Pedido -->
<div class="inline-block">
    <form action="{{route('centers.requestCheckInventory',['center'=>$dbDepartment->id,'request'=>$db->id])}}" method="post" class="d-inline-block">
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