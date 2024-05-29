<x-pages.index>    

    <!-- Slot Header -->
    @slot('header')
        <x-header title="{{$dbEstablishment->title}}" route="{{route('contacts.index')}}" btnTitle="Retornar"/>
    @endslot

    @slot('body')     
    
        <!-- Search -->
        <x-search.formSearch>
            <x-search.inputSearch label="Departamentos" id="searchName" value="{{ $search['searchName'] ?? '' }}" class="flex-1"/>
        </x-search.formSearch>

        <x-table.table :db="$db">
            @slot('thead')
                <x-table.th>Setor</x-table.th>
                <x-table.th>Contato</x-table.th>
                <x-table.th>Ramal</x-table.th>
            @endslot

            @slot('tbody')
                @foreach ($db as $item)
                    <x-table.tr>
                        <x-table.td>{{$item->department}}</x-table.td>                            
                        <x-table.td class="text-center">{{$item->contact}}</x-table.td>                            
                        <x-table.td class="text-center">{{$item->extension}}</x-table.td>
                    </x-table.tr>
                @endforeach
            @endslot
        </x-table.table>
    @endslot
</x-pages.index>