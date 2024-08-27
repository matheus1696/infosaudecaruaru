<!-- Search -->
<x-search.formSearch>
    <x-search.selectSearch label="Unidade" name="searchName">
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
    <x-search.selectSearch label="Ramais" name="searchExtension">
        @foreach ($dbContacts as $dbContact)
            <option 
                value="{{$dbContact->establishment_id}}"
                @isset($search['searchExtension'])
                    @if($dbContact->establishment_id == $search['searchExtension']) selected @endif
                @endisset
            >
                {{$dbContact->contact}} - {{$dbContact->CompanyEstablishment->title}} - {{$dbContact->title}}
            </option>
        @endforeach
    </x-search.selectSearch>
</x-search.formSearch>