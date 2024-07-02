<!-- Excluir itens cadastrados -->
<div class="inline-block">
    <form action="{{route('foodstuff.store_rooms.destroyDefaultList',['store_room'=>$db->department_id,'request'=>$db->id])}}" method="post" class="d-inline-block">
        @csrf
        <input hidden name="standardRequestDestroy" value="true">
        <button
            type="submit"
            class="px-2 py-1 m-1 text-xs text-white bg-red-700 rounded-lg shadow-md hover:bg-red-900"
            onclick="return confirm('Realmente deseja realizar a exclusão de todos os itens adicionados?')"
        >
            <i class="fas fa-trash"></i>
            <span class="ml-1 font-semibold">Remover Todos os Itens</span>
        </button>
    </form>
</div>