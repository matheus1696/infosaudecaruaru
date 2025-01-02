<div>
    <x-table.table>
        @slot('search')
            <div class="flex justify-end gap-2 py-3">
                <div class="w-full md:w-80">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Pesquisar nome ou email" />
                </div>
            </div>
        @endslot
        
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-24">Cód.</x-table.th>
            <x-table.th>Descrição</x-table.th>
            <x-table.th class="w-40">Status de Operacão Atual</x-table.th>
            <x-table.th class="w-40">Classificação</x-table.th>
            <x-table.th class="w-60">Unidade</x-table.th>
            <x-table.th class="w-24"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbBeds as $dbBed)
                <x-table.tr>
                    <x-table.td>{{ $dbBed->code }}</x-table.td>
                    <x-table.td>{{ $dbBed->title }}</x-table.td>
                    <x-table.td>{{ $dbBed->HospitalBedStatus->title }}</x-table.td>
                    <x-table.td>{{ $dbBed->HospitalBedClassification->title }}</x-table.td>
                    <x-table.td>{{ $dbBed->CompanyEstablishment->title }}</x-table.td>
                    <x-table.td>                        
                        <x-button.btn-status condition="{{$dbBed->status}}" route="{{route('hospital_beds.status',['hospital_bed'=>$dbBed->id])}}" />
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
