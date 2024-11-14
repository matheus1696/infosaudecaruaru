<x-table.table :db="$db">
    @slot('thead')
        <x-table.th>Fabricante</x-table.th>
        <x-table.th>Modelo</x-table.th>
        <x-table.th class="w-32">Motor</x-table.th>
        <x-table.th class="w-32">Transmissão</x-table.th>
        <x-table.th class="w-32">Tipo de Abastecimento</x-table.th>
        <x-table.th class="w-28"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$item->FleetManufacturer->manufacturer}}</x-table.td>
                <x-table.td>{{$item->model}}</x-table.td>
                <x-table.td>{{$item->engine}}</x-table.td>
                <x-table.td>{{$item->transmission}}</x-table.td>
                <x-table.td>{{$item->fuel_type}}</x-table.td>
                <x-table.td>
                    <x-button.minButtonEdit route="{{route('fleet_models.edit',['fleet_model'=>$item->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>