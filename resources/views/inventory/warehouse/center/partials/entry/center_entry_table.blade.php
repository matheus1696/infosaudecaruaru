<h3 class="text-center text-lg mt-3 mb-2">Últimos Cadastros Realizados</h3>

<x-table.table>
    @slot('thead')
        <x-table.th class="w-20">Data</x-table.th>
        <x-table.th class="w-28">Movimentação</x-table.th>
        <x-table.th class="w-24">O.F.</x-table.th>
        <x-table.th class="w-24">Parcela</x-table.th>
        <x-table.th class="w-10">B.F.</x-table.th>
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-10">Qtd</x-table.th>
        <x-table.th class="w-28">Usuário</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbHistories as $dbHistory)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y',strtotime($dbHistory->created_at))}}</x-table.td>
                <x-table.td><i class="fas fa-long-arrow-alt-up rotate-45 mr-1 text-green-500"></i> {{$dbHistory->movement}}</x-table.td>
                <x-table.td>{{$dbHistory->supply_order}}</x-table.td>
                <x-table.td>{{$dbHistory->supply_order_parcel}}</x-table.td>
                <x-table.td>{{$dbHistory->CompanyFinancialBlock->acronym}}</x-table.td>
                <x-table.td>{{$dbHistory->Consumable->title}}</x-table.td>
                <x-table.td>{{$dbHistory->quantity}}</x-table.td>
                <x-table.td> <p class="line-clamp-1">{{$dbHistory->User->name}}</p></x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>