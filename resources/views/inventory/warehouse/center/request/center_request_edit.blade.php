<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="Solicitação Nº: {{$db->code}}"
            routeBack="{{route('warehouse_centers.requestShow',['warehouse_center'=>$db->department_id])}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('inventory.warehouse.center.partials.request.edit.center_request_description')
        </x-conteiner>
        @include('inventory.warehouse.center.partials.request.edit.center_request_table')

        <div>
            <form action="{{route('warehouse_centers.requestConfirmedAll',['request'=>$db->id])}}" method="post">
                @csrf @method('PUT')
                <button type="submit">Confirmar Envio</button>
            </form>
        </div>
    @endslot
</x-pages.index>