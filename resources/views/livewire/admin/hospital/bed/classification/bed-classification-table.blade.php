<div>
    <x-table.table>
        
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="min-w-32">Classificação</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbBedClassifications as $dbBedClassification)
                <x-table.tr>
                    <x-table.td>{{ $dbBedClassification->title }}</x-table.td>
                    <x-table.td>                        
                        <x-button.btn-status condition="{{$dbBedClassification->status}}" route="{{route('hospital_bed_classifications.status',['hospital_bed_classification'=>$dbBedClassification->id])}}" />
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
