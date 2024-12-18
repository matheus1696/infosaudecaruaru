<div>
    <x-table.table :paginate="$dbDoctors">
        @slot('search')
            <div class="flex justify-between gap-2 py-3">
                <div class="w-44 md:w-32">
                    <x-form.form-select wire:model.live="perPage">
                        <option value="10" selected>10 por página</option>
                        <option value="20">20 por página</option>
                        <option value="30">30 por página</option>
                        <option value="40">40 por página</option>
                        <option value="50">50 por página</option>
                    </x-form.form-select>
                </div>

                <div class="w-full md:w-80">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Pesquisar CRM ou nome" />
                </div>
            </div>
        @endslot
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-16 md:w-24">CRM</x-table.th>
            <x-table.th>Nome</x-table.th>
            <x-table.th>Especialidade</x-table.th>
            <x-table.th class="w-24">Status</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbDoctors as $dbDoctor)
                <x-table.tr>
                    <x-table.td>{{$dbDoctor->crm}}</x-table.td>
                    <x-table.td>{{$dbDoctor->name}}</x-table.td>
                    <x-table.td>{{$dbDoctor->specialty}}</x-table.td>
                    <x-table.td>
                        <x-button.btn-status condition="{{$dbDoctor->status}}" route="{{route('professional_doctors.status',['professional_doctor'=>$dbDoctor->id])}}" />
                    </x-table.td>
                    <x-table.td>
                        <x-button.min-btn-edit href="{{route('professional_doctors.edit',['professional_doctor'=>$dbDoctor->id])}}" />
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>