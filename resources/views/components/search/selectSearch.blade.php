<div class="flex items-center gap-1 {{$class ?? ''}} w-full">
    @include('components.search.labelSearch')
    <select
        id="select_search_{{$id ?? $name}}" 
        name="{{$name}}" 
        value="{{$value ?? ''}}"
        class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-md focus:bg-white focus:outline-none select2"
    >       
        <option class="py-3 disabled:bg-gray-100 text-gray-100/50" value="">Todos</option>
        {{$slot}}
    </select>
</div>