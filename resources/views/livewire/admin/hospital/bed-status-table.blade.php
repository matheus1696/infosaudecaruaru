<div>
    <x-table.table>
        
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="min-w-32">Classificação</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbBedStatuses as $dbBedStatus)
                <x-table.tr>
                    <x-table.td>{{ $dbBedStatus->title }}</x-table.td>
                    <x-table.td>                        
                        <x-button.btn-status condition="{{$dbBedStatus->status}}" route="{{route('hospital_bed_statuses.status',['hospital_bed_status'=>$dbBedStatus->id])}}" />
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
