<div class="inline-block">
    <a
        href="{{$route}}"
        class="px-2 py-1 m-1 text-xs text-white rounded-lg shadow-md bg-{{$color ?? 'cyan'}}-700 hover:bg-{{$color ?? 'cyan'}}-900"
    >
        <i class="{{$icon ?? 'fas fa-location-arrow'}}"></i>

        @isset($title) <span class="pl-2">{{$title}}</span> @endisset
    </a>
</div>
