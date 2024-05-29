<div class="inline-block">
    <!-- Modal toggle -->
    <button 
        data-toggle="modal"
        data-target="#modalInfo_{{$id}}"
        class="px-2 py-1 m-1 text-xs text-white bg-{{$color ?? 'green'}}-700 rounded-lg shadow-md hover:bg-{{$color ?? 'green'}}-600" 
        type="button"
    >
        <i class="{{$icon ?? "fas fa-eye"}}"></i>
        @isset($btnTitle) <span class="font-semibold">{{$btnTitle}}</span> @endisset
    </button>

    <div id="modalInfo_{{$id}}" class="modal fade"  role="dialog" aria-labelledby="modalLabelInfo_{{$id}}" aria-hidden="true">
        <div class="text-left modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-lg font-semibold modal-title" id="modalLabelInfo_{{$id}}">{{$title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="m-4 modal-body">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</div>