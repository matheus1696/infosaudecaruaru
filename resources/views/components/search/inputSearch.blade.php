<div class="flex items-center gap-1 w-full {{$class ?? ''}}">
    @include('components.search.labelSearch')
    <input 
        type="{{$type ?? 'text'}}" 
        id="{{$id}}" 
        name="{{$id}}" 
        value="{{$value ?? ''}}"
        class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-md focus:bg-white focus:outline-none"
        @if (empty($placeholder)) placeholder="{{$label ?? ""}}" @else placeholder="{{$placeholder}}" @endif
    >
</div>