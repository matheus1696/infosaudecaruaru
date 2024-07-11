<!-- Atualizar dados -->
@if ($db->status_id == "1")
<div class="flex flex-row items-center justify-end col-span-12 gap-3 mb-2">
    <div>            
        <button  type="submit" class="text-xs text-white transition duration-300 rounded-lg shadow-md bg-{{$color ?? 'sky'}}-800 hover:bg-{{$color ?? 'sky'}}-600 p-1 preventSubmitBtn">Atualizar Dados</button>
    </div>  
</div>
@endif