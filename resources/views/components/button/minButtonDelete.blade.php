<div class="inline-block">
    <form action="{{$route}}" method="post" class="d-inline-block">
        @csrf @method('DELETE')
        <button
            type="submit"
            class="px-2 py-1 m-1 text-xs text-white bg-red-700 rounded-lg shadow-md hover:bg-red-900"
            onclick="return confirm('Realmente deseja realizar a exclusão?')"
        >
            <i class="fas fa-trash"></i>
        </button>
    </form>
</div>
