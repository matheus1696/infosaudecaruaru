<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitação Nº: {{$db->code}}"
            routeBack="{{route('warehouse.centers.requestShow',['center'=>$dbDepartment->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')       
        @include('inventory.warehouse.center.partials.request.edit_request.center_edit_request_description_group')

        <hr class="my-2">
        
        @include('inventory.warehouse.center.partials.request.edit_request.center_edit_request_button_group')
        @include('inventory.warehouse.center.partials.request.edit_request.center_edit_request_table')
    @endslot
</x-pages.index>