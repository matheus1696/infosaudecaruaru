<!-- Componente Header -->
<div>    
    <div class="flex flex-col items-center justify-between gap-4 px-2 pt-2 md:flex-row">
        <div class="flex-1">
            <p class="text-[28px] font-semibold">{{$title ?? ''}}</p>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-4">
            @isset($routeCreate)                
                <div>
                    <a href="{{$routeCreate}}">
                        <span class="px-3 py-2 text-xs text-white bg-green-700 rounded-full shadow-md hover:bg-green-600">
                            <i class="pr-1 fas fa-plus"></i> 
                            {{$btnTitleCreate ?? "Adicionar"}}
                        </span>
                    </a>
                </div>
            @endisset
            
            @isset($routeEdit)                
                <div>
                    <a href="{{$routeEdit}}">
                        <span class="px-3 py-2 text-xs text-white bg-yellow-500 rounded-full shadow-md hover:bg-yellow-600">
                            <i class="pr-1 fas fa-pen"></i> 
                            {{$btnTitleEdit ?? "Editar"}}
                        </span>
                    </a>
                </div>
            @endisset
            
            @isset($routeJoker)                
                <div>
                    <a href="{{$routeJoker}}">
                        <span class="px-3 py-2 text-xs text-white rounded-full shadow-md bg-{{$colorJoker ?? 'sky'}}-700 hover:bg-{{$colorJoker ?? 'sky'}}-600">
                            <i class="{{$iconJoker ?? 'fas fa-pen'}} pr-1"></i> 
                            {{$btnTitleJoker ?? ""}}
                        </span>
                    </a>
                </div>
            @endisset
            
            @isset($routeDestroy)                
                <div>                    
                    <form action="{{$routeDestroy}}" method="post">
                        @csrf @method('PUT')
                        <button
                            type="submit"
                            class="px-3 py-2 text-xs text-white rounded-full shadow-md bg-{{$colorDestroy ?? 'red'}}-700 hover:bg-{{$colorDestroy ?? 'red'}}-600"
                            onclick="return confirm('Realmente deseja realizar a exclusão?')"
                        >
                            <i class="{{$iconDestroy ?? 'fas fa-trash'}} pr-1"></i>
                            {{$btnTitleDestroy ?? ""}}
                        </button>
                    </form>
                </div>
            @endisset

            @isset($routeBack)                
                <div>
                    <a href="{{$routeBack}}">
                        <span class="px-3 py-2 text-xs text-white bg-gray-700 rounded-full shadow-md hover:bg-gray-600">
                            <i class="pr-1 fas fa-undo"></i> 
                            {{$btnTitleBack ?? "Retornar"}}
                        </span>
                    </a>
                </div>
            @endisset
        </div>
    </div>
</div>