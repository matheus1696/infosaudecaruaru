<!-- Search -->
<x-search.formSearch>
    <x-search.inputSearch label="Código CBO" id="searchCod" value="{{ $search['searchCod'] ?? '' }}"/>
    <x-search.selectSearch label="Ocupação" id="searchName" class="flex-1">
        @foreach ($dbCompanyOccupations as $dbCompanyOccupations)
            <option 
                value="{{$dbCompanyOccupations->title}}"
                @isset($search['searchName'])
                    @if($dbCompanyOccupations->title == $search['searchName']) selected @endif
                @endisset
            >
                {{$dbCompanyOccupations->title}}
            </option>
        @endforeach
    </x-search.selectSearch>
</x-search.formSearch>