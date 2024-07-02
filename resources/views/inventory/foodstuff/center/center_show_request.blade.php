<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitações de Alimentos"
            routeBack="{{route('foodstuff.centers.show',['center'=>$dbDepartment->id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')    
        @include('inventory.foodstuff.center.partials.request.show_request.center_show_request_table_group')
    @endslot
</x-pages.index>