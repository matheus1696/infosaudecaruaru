<div class="col-span-12 md:col-span-{{$col ?? '12'}}">
    <textarea
        name="{{$name}}"
        id="{{$id ?? $name}}"
        class="w-full summernote"
    >@if(empty($value)){{old($name)}}@else{!!$value!!}@endif</textarea>

    @error($name)
        <x-form.errors-message>
            {{$message}}
        </x-form.errors-message>
    @enderror
</div>
