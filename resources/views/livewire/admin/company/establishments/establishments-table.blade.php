<div>
    <x-table.table :paginate="$dbEstablishments">
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
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Pesquisar cnes, unidade" />
                </div>
            </div>
        @endslot
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="hidden md:table-cell">Código</x-table.th>
            <x-table.th>Estabelecimento</x-table.th>
            <x-table.th class="hidden md:table-cell">Bairro</x-table.th>
            <x-table.th class="hidden md:table-cell">Bloco Financeiro</x-table.th>
            <x-table.th class="w-28">Status</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbEstablishments as $dbEstablishment)
                <x-table.tr>
                    <x-table.td class="hidden md:table-cell">{{$dbEstablishment->code}}</x-table.td>
                    <x-table.td>{{$dbEstablishment->title}}</x-table.td>
                    <x-table.td class="hidden md:table-cell">{{$dbEstablishment->district}}</x-table.td>
                    <x-table.td class="hidden md:table-cell">{{$dbEstablishment->FinancialBlock->title}}</x-table.td>
                    <x-table.td>
                        <x-button.btn-status condition="{{$dbEstablishment->status}}" route="{{route('establishments.status',['establishment'=>$dbEstablishment->id])}}" />
                    </x-table.td>
                    <x-table.td>
                        <x-button.min-btn-show href="{{route('establishments.show',['establishment'=>$dbEstablishment->id])}}" />
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>