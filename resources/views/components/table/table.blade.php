<div class="overflow-x-auto shadow-md rounded-xl lg:overflow-hidden">
    <table class="w-full bg-white border table-auto">
        <thead class="text-sm text-center bg-green-200 border-b-2 border-green-800">
            <tr>
                {{$thead ?? ""}}
            </tr>
        </thead>

        <tbody class="text-sm text-center">
            {{$tbody ?? ""}}
        </tbody>
    </table>
</div>

@isset($db)
    <div>
        @if ($db->count() == 0)
            <p class="py-3 text-xs text-center text-secondary">Nenhum dado cadastrado</p> 
        @else
            <p class="py-3 text-xs text-center text-secondary">Total de {{ $db->count() ?? ""}} cadastrados</p> 
        @endif
    </div>
    
    <div class="flex items-center justify-center px-3 py-2">
        <div class="text-sm">
            {{ $db->appends($_GET)->links() }}
        </div>
    </div>
@endisset