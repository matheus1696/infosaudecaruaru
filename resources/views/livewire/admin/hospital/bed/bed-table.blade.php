<div>
    <x-table.table>
        
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-16">Cód.</x-table.th>
            <x-table.th class="min-w-28">Descrição</x-table.th>
            <x-table.th class="w-16">Status de Operacão</x-table.th>
            <x-table.th class="w-16">Classificação</x-table.th>
            <x-table.th class="min-w-32">Unidade</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbBeds as $dbBed)
                <x-table.tr>
                    <x-table.td>{{ $dbBed->code }}</x-table.td>
                    <x-table.td>{{ $dbBed->title }}</x-table.td>
                    <x-table.td>{{ $dbBed->operational_status_id }}</x-table.td>
                    <x-table.td>{{ $dbBed->classification_id }}</x-table.td>
                    <x-table.td>{{ $dbBed->establishment_id }}</x-table.td>
                    <x-table.td>                        
                        <x-button.btn-status condition="{{$dbBed->status}}" route="{{route('hospital_beds.status',['hospital_bed'=>$dbBed->id])}}" />
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
