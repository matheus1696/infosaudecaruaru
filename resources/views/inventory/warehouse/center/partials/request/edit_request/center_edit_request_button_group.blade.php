<div class="flex flex-col items-center justify-end col-span-12 gap-1 mb-2 md:flex-row">
    <h3 class="flex-1 col-span-12 px-3 text-lg font-semibold">Lista de Itens Solicitados</h3>
    @if ($db->status == "Aberto")
        <div class="flex">
            @include('inventory.warehouse.center.partials.request.edit_request.center_edit_request_button_confirmed_all')
        </div>
    @endif
</div>