<div class="inline-block">
    <!-- Modal toggle -->
    <button {{ $attributes->merge([
        'type' => 'button', 
        'data-toggle' => 'modal', 
        'data-target' => '#buttonModal_' . $id, 
        'class' => 'px-2 py-1 m-1 text-xs rounded-lg shadow-md'
    ]) }}
    >
        <i class="{{$icon ?? "fas fa-eye"}} text-inherit"></i>
        @isset($btnTitle) <span class="ml-1 font-semibold text-inherit">{{$btnTitle}}</span> @endisset
    </button>

    <div id="buttonModal_{{$id}}" class="modal fade" role="dialog" aria-labelledby="modalLabel_{{$id}}" aria-hidden="true">
        <div class="text-left modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-lg font-semibold modal-title mx-5" id="modalLabel_{{$id}}">{{$title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb-10 mx-5">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</div>