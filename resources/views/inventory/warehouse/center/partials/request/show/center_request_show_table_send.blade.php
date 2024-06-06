<x-table.table>
    @slot('thead')
        <x-table.th>Suprimentos</x-table.th>
        <x-table.th class="w-32">Quantidade</x-table.th>
        <x-table.th class="w-28"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($dbDepartment as $item)
            <x-table.tr>
                <x-table.td></x-table.td>
                <x-table.td></x-table.td>
                <x-table.td></x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>