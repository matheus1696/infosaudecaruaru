<div class="my-3">
    <x-table.table color="orange">
        @slot('thead')
            <x-table.th>Almoxarifado</x-table.th>
            <x-table.th class="w-32">Status</x-table.th>
            <x-table.th class="w-32"></x-table.th>
        @endslot
    
        @slot('tbody')
            @foreach ($dbStoreRooms as $dbStoreRoom)
                <x-table.tr>
                    <x-table.td>{{$dbStoreRoom->title}}</x-table.td>
                    <x-table.td>
                        <x-button.buttonStatus condition="{{$dbStoreRoom->status}}" name="status" route="{{route('inventory_store_rooms.status',['inventory_store_room'=>$dbStoreRoom->id])}}" />
                    </x-table.td>
                    <x-table.td class="text-center">                        
                        <x-button.minButtonModalEdit id="Departamento{{$dbStoreRoom->id}}" title="{{$dbStoreRoom->title}}">                            
                            <x-form.form method="edit" route="{{route('inventory_store_rooms.update',['inventory_store_room'=>$dbStoreRoom->id])}}">
                                <input type="hidden" id="establishment_id" name="establishment_id" value="{{$db->id}}">
                                <x-form.input col="12" label="Título" id="title" name="title" value="{{$dbStoreRoom->title}}"/>
                            </x-form.form>                            
                        </x-button.minButtonModalEdit>

                        <x-button.minButtonDelete route="{{route('inventory_store_rooms.destroy',['inventory_store_room'=>$dbStoreRoom->id])}}"/>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot
    </x-table.table>
</div>