<div class="col-span-12 md:col-span-{{$col ?? '12'}}">
    <select
        name="{{$name}}"
        id="form_{{$id ?? $name}}"
        class="w-full outline-none select2"
        @isset($onchange) onchange="{{$onchange}}" @endisset
        required
    >
        <option selected disabled>Selecione</option>
        {{$slot}}
        
    </select>

    @error($name)
        <x-form.errors-message>
            {{$message}}
        </x-form.errors-message>
    @enderror
</div>


