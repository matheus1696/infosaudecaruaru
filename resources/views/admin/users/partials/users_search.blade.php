<!-- Search -->
<x-search.formSearch>
    <x-search.selectSearch label="Nome do Usuário" id="searchName" class="flex-1">
        @foreach ($dbUsers as $dbUser)
            <option 
                value="{{$dbUser->name}}"
                @isset($search['searchName'])
                    @if($dbUser->name == $search['searchName']) selected @endif
                @endisset
            >
                {{$dbUser->name}}
            </option>
        @endforeach
    </x-search.selectSearch>

    <x-search.selectSearch label="Email" id="searchEmail" class="flex-1">
        @foreach ($dbUsers as $dbUser)
            <option 
                value="{{$dbUser->email}}"
                @isset($search['searchEmail'])
                    @if($dbUser->email == $search['searchEmail']) selected @endif
                @endisset
            >
                {{$dbUser->email}}
            </option>
        @endforeach
    </x-search.selectSearch>
</x-search.formSearch>