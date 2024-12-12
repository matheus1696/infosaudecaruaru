@error($for)
    <div>
        <span {{ $attributes->merge(['class'=>'text-xs text-red-500 pl-1']) }}>
            {{ $message }}
        </span>
    </div>
@enderror