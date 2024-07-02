<h3 class="mt-3 mb-2 text-lg text-center">Últimos Cadastros Realizados</h3>

<x-table.table>
    @slot('thead')
        <x-table.th class="w-32">Data de Cadastro</x-table.th>
        <x-table.th class="w-32">Movimentação</x-table.th>
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-32">Quantidade</x-table.th>
        <x-table.th class="w-48">Usuário</x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbHistories as $dbHistory)
            <x-table.tr>
                <x-table.td>{{date('d/m/Y',strtotime($dbHistory->created_at))}}</x-table.td>
                <x-table.td><i class="mr-1 text-green-500 rotate-45 fas fa-long-arrow-alt-up"></i> {{$dbHistory->movement}}</x-table.td>
                <x-table.td>{{$dbHistory->Consumable->title}}</x-table.td>
                <x-table.td>{{$dbHistory->quantity}}</x-table.td>
                <x-table.td>{{$dbHistory->User->name}}</x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>