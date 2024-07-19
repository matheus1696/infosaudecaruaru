<h3 class="text-center text-lg mt-3 mb-2">Últimos Cadastros Realizados</h3>

<x-table.table>
    @slot('thead')
        <x-table.th class="w-20">Data</x-table.th>
        <x-table.th class="w-40">Movimentação</x-table.th>
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-14">Qtd</x-table.th>
        <x-table.th class="w-40">Usuário</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbHistories as $dbHistory)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y',strtotime($dbHistory->created_at))}}</x-table.td>
                <x-table.td><i class="fas fa-long-arrow-alt-up rotate-45 mr-1 text-green-500"></i> {{$dbHistory->movement}}</x-table.td>
                <x-table.td>{{$dbHistory->Consumable->title}}</x-table.td>
                <x-table.td>{{$dbHistory->quantity}}</x-table.td>
                <x-table.td> <p class="line-clamp-1">{{$dbHistory->User->name}}</p></x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>