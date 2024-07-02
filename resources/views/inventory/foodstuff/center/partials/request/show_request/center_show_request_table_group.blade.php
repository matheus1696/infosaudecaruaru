<nav>
    <div class="mb-3 nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-requests-open-tab" data-toggle="tab" data-target="#nav-requests-open" type="button" role="tab" aria-controls="nav-requests-open" aria-selected="true">
            <span class="text-sm font-semibold">Solicitações Abertas ({{$dbRequestsOpen->count()}})</span>
        </button>
        <button class="nav-link" id="nav-requests-forwarded-delivery-tab" data-toggle="tab" data-target="#nav-requests-forwarded-delivery" type="button" role="tab" aria-controls="nav-requests-forwarded-delivery" aria-selected="false">
            <span class="text-sm font-semibold">Encaminhado para Entrega ({{$dbRequestsForwarded->count()}})</span>
        </button>
        <button class="nav-link" id="nav-requests-completed-tab" data-toggle="tab" data-target="#nav-requests-completed" type="button" role="tab" aria-controls="nav-requests-completed" aria-selected="false">
            <span class="text-sm font-semibold">Concluído ({{$dbRequestsCompleted->count()}})</span>
        </button>
        <button class="nav-link" id="nav-requests-canceled-tab" data-toggle="tab" data-target="#nav-requests-canceled" type="button" role="tab" aria-controls="nav-requests-canceled" aria-selected="false">
            <span class="text-sm font-semibold">Cancelados ({{$dbRequestsCanceled->count()}})</span>
        </button>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-requests-open" role="tabpanel" aria-labelledby="nav-requests-open-tab">           
        @include('inventory.foodstuff.center.partials.request.show_request.center_show_request_table_open') 
    </div>
    <div class="tab-pane fade" id="nav-requests-forwarded-delivery" role="tabpanel" aria-labelledby="nav-requests-forwarded-delivery-tab">            
        @include('inventory.foodstuff.center.partials.request.show_request.center_show_request_table_forwarded')
    </div>
    <div class="tab-pane fade" id="nav-requests-completed" role="tabpanel" aria-labelledby="nav-requests-completed-tab">           
        @include('inventory.foodstuff.center.partials.request.show_request.center_show_request_table_completed')
    </div>
    <div class="tab-pane fade" id="nav-requests-canceled" role="tabpanel" aria-labelledby="nav-requests-canceled-tab">           
        @include('inventory.foodstuff.center.partials.request.show_request.center_show_request_table_canceled')
    </div>
</div>