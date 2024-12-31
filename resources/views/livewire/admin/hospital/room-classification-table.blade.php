<div>
    <x-table.table>
        
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="min-w-32">Classificação</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbRoomClassifications as $dbRoomClassification)
                <x-table.tr>
                    <x-table.td>{{ $dbRoomClassification->title }}</x-table.td>
                    <x-table.td>                        
                        <x-button.btn-status condition="{{$dbRoomClassification->status}}" route="{{route('hospital_room_classifications.status',['hospital_room_classification'=>$dbRoomClassification->id])}}" />
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
