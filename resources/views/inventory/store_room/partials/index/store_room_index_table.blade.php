<x-table.table>
    @slot('thead')
        <x-table.th>Descrição Almoxarifado</x-table.th>
        <x-table.th>Unidade</x-table.th>
        <x-table.th class="w-28">Acesso</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbStoreRooms as $dbStoreRoom)
            <x-table.tr>
                <x-table.td>{{$dbStoreRoom->title}}</x-table.td>
                <x-table.td>{{$dbStoreRoom->CompanyEstablishment->title}}</x-table.td>
                <x-table.td>
                    <x-button.minButtonShow route="{{route('inventory_store_room_items.show',['inventory_store_room_item'=>$dbStoreRoom->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>