<x-table.table>
    @slot('thead')
        <x-table.th>Descrição Almoxarifado</x-table.th>
        <x-table.th>Tipo do Almoxarifado</x-table.th>
        <x-table.th>Unidade</x-table.th>
        <x-table.th class="w-28">Acesso</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$item->title}}</x-table.td>
                <x-table.td>{{$item->CompanyEstablishmentTypeWarehouse->title}}</x-table.td>
                <x-table.td>{{$item->CompanyEstablishment->title}}</x-table.td>
                <x-table.td>
                    <x-button.minButtonShow route="{{route('warehouse.store_rooms.show',['store_room'=>$item->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>