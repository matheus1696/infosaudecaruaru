@error($for)
    <div>
        <span {{ $attributes->merge(['class'=>'text-xs text-red-500 p-1']) }}>
            {{ $message }}
        </span>
    </div>
@enderror