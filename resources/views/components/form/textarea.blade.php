<div class="col-span-12 md:col-span-{{$col ?? '12'}}">
    @include('components.form.label')
    <textarea
        name="{{$name}}"
        id="{{$id ?? $name}}"
        class="w-full px-2 py-2 summernote"
    >@if(empty($value)){{old($name)}}@else{!!$value!!}@endif</textarea>

    @error($name)
        <x-form.errors-message>
            {{$message}}
        </x-form.errors-message>
    @enderror
</div>
