<a 
    {{ $attributes->merge(['class' => 'w-full px-2 py-1.5 rounded-lg text-center text-sm text-white hover:text-white shadow-md transition ease-in-out duration-300 ' . (config('adminlte.class_btn_primary') ?? '') ]) }}
>
    {{ $value ?? 'Enviar' }}
</a>