<x-accordion.accordion>
    <x-accordion.accordionItem title="Dados da Solicitação">
        @include('inventory.warehouse.center.partials.request.edit_request.center_edit_request_description_request')
    </x-accordion.accordionItem>
    <x-accordion.accordionItem title="Dados do Solicitante">
        @include('inventory.warehouse.center.partials.request.edit_request.center_edit_request_description_user')
    </x-accordion.accordionItem>
</x-accordion.accordion>