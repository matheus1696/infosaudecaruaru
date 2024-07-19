<!-- Search -->
<x-search.formSearch>
    <x-search.selectSearch label="Suprimentos" name="consumable_id" class="flex-1">
        @foreach ($dbConsumables as $dbConsumable)
            <option 
                value="{{$dbConsumable->id}}"
                @isset($search['searchName'])
                    @if($dbConsumable->title == $search['consumable_id']) selected @endif
                @endisset
            >
                {{$dbConsumable->title}}
            </option>
        @endforeach
    </x-search.selectSearch>
</x-search.formSearch>