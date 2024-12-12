@if ($errors->any())
    <div class="relative px-4 py-3 mb-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
        <span class="block sm:inline">Ops! encontramos um erro ao enviar o formulário. Você poderia, por gentileza, revisar os campos?</span>
        <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Inicio do Formulário -->
<form method="POST" action="{{$route}}">
    @csrf @if($method == "edit") @method('PUT') @endif

    <div class="grid grid-cols-1 gap-4 md:grid-cols-12">
        {{$slot}}
    </div>

    @if (isset($btnHidden))
        
    @else
        <div class="flex items-center justify-center gap-3 my-3">
            @if ($method == "create")
                <div class="w-full">
                    <button type="submit" class="w-full my-2 text-sm text-white transition duration-300 bg-{{$color ?? 'green'}}-800 rounded-lg shadow-md h-9 hover:bg-{{$color ?? 'green'}}-700">{{$title ?? 'Cadastrar'}}</button>
                </div>
            @else
                <div class="w-full">
                    <button type="submit" class="w-full my-2 text-sm text-white transition duration-300 rounded-lg shadow-md bg-{{$color ?? 'sky'}}-600 h-9 hover:bg-{{$color ?? 'sky'}}-700">{{$title ?? 'Salvar Alteração'}}</button>
                </div>
            @endif
        </div>
    @endif
</form>
