<x-table.table>
    @slot('thead')
        <x-table.th>Descrição Almoxarifado</x-table.th>
        <x-table.th class="w-80">Tipo do Almoxarifado</x-table.th>
        <x-table.th>Unidade</x-table.th>
        <x-table.th class="w-28">Acesso</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbWarehouses as $dbWarehouse)
            <x-table.tr>
                <x-table.td>{{$dbWarehouse->title}}</x-table.td>
                <x-table.td>{{$dbWarehouse->CompanyEstablishmentWarehouseType->title}}</x-table.td>
                <x-table.td>{{$dbWarehouse->CompanyEstablishment->title}}</x-table.td>
                <x-table.td>
                    <x-button.minButtonShow route="{{route('warehouses.show',['warehouse'=>$dbWarehouse->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>