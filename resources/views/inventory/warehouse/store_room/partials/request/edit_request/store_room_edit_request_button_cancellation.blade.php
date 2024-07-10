<div class="inline-block">    
    <a
        href="{{route('warehouse.store_rooms.destroy',['store_room'=>$db->department_id,'request'=>$db->id])}}"
        class="px-2 py-1 text-xs text-white bg-yellow-700 rounded-lg shadow-md hover:bg-yellow-900"
        onclick="return confirm('Realmente deseja realizar o cancelamento da solicitação?')"
    >
        <i class="fas fa-times"></i>
        <span class="ml-1 font-semibold">Cancelar Solicitação</span>
    </a>
</div>