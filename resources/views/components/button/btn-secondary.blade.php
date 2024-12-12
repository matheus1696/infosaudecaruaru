<button 
    {{ $attributes->merge(['type' => 'submit','class' => 'w-full px-2 py-1.5 rounded-lg text-sm text-white shadow-md transition ease-in-out duration-300 ' . (config('adminlte.class_btn_secondary') ?? '') ]) }}
>
    {{ $value ?? 'Enviar' }}
</button>