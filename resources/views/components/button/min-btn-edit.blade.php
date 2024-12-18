<div class="inline-block">
    <a {{ $attributes->merge(['class' => 'w-full px-2 py-1 m-1 rounded-lg text-xs text-white hover:text-white shadow-md transition ease-in-out duration-300 bg-yellow-700 hover:bg-yellow-900' ]) }} >
        <i class='fas fa-pen'></i>
        @isset($title) <span class="pl-2">{{$title}}</span> @endisset
    </a>
</div>
