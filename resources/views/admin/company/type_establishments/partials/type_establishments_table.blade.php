<x-table.table :db="$db">
    @slot('thead')
        <x-table.th>Tipo de Estabelecimento</x-table.th>
        <x-table.th class="w-28">Status</x-table.th>
        <x-table.th class="w-40"></x-table.th>
    @endslot

    @slot('tbody')
        @foreach ($db as $item)
            <x-table.tr>
                <x-table.td>{{$item->title}}</x-table.td>
                <x-table.td class="text-center">
                    <x-button.buttonStatus condition="{{$item->status}}" route="{{route('type_establishments.update',['type_establishment'=>$item->id])}}" name="status" />
                </x-table.td>
                <x-table.td class="text-center">
                    <x-button.minButtonModalInfo id="TypeEstablishmentsModal{{$item->id}}" title="Estabelecimentos Cadastrados">
                        <ul>
                            @foreach ($dbEstablishments as $dbEstablishment)
                                @if ($dbEstablishment->type_establishment_id == $item->id)
                                    <li>{{$dbEstablishment->title}}</li>
                                @endif
                            @endforeach
                        </ul>
                    </x-button.minButtonModalInfo>
                    <x-button.minButtonEdit route="{{route('type_establishments.edit',['type_establishment'=>$item->id])}}" />
                    <x-button.minButtonDelete route="{{route('type_establishments.destroy',['type_establishment'=>$item->id])}}" />
                </x-table.td>
            </x-table.tr>
        @endforeach
    @endslot
</x-table.table>