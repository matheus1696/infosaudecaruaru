<!-- Search -->
<x-search.formSearch>
    <x-search.selectSearch label="Unidade" id="searchName" class="flex-1">
        @foreach ($dbEstablishments as $dbEstablishment)
            <option 
                value="{{$dbEstablishment->title}}"
                @isset($search['searchName'])
                    @if($dbEstablishment->title == $search['searchName']) selected @endif
                @endisset
            >
                {{$dbEstablishment->title}}
            </option>
        @endforeach
    </x-search.selectSearch>
</x-search.formSearch>