<div class="col-span-12 md:col-span-{{$col ?? '12'}}">
    @include('components.form.label')
    <input
        type="{{$type ?? "text"}}"
        name="{{$name}}"
        id="{{$id ?? $name}}"
        class="w-full px-2 py-2 text-sm border border-gray-800 rounded-md disabled:bg-gray-200"
        @isset($min) min="{{$min}}" @endisset        
        @isset($max) max="{{$max}}" @endisset
        @isset($minlength) minlength="{{$minlength}}" @endisset
        @isset($maxlength) maxlength="{{$maxlength}}" @endisset
        @error($name) value="{{old($name)}}" @enderror
        @if (empty($value)) value="{{old($name)}}" @else value="{{$value}}" @endif
        @if (empty($placeholder)) placeholder="{{$label ?? ""}}" @else placeholder="{{$placeholder}}" @endif
        {{$disabled ?? ""}}
        {{$required ?? ""}}
        {{$autofocus ?? ""}}
        
        @isset($onchange) onchange="{{$onchange}}" @endisset

        @isset($type)
            @if ($type == 'tel') onkeyup="handlePhone(event)" @endif
            @if ($type == 'number') min='0' @endif
        @endisset
        @if ($name == 'registration') onkeyup="handleRegistration(event)" @endif
        @if ($name == 'cpf') onkeyup="handleCPF(event)" @endif
    >
    @error($name)
        <x-form.errors-message>
            {{$message}}
        </x-form.errors-message>
    @enderror
</div>