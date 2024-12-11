<button 
    {{ $attributes->merge(['type' => 'submit','class' => 'w-full px-4 py-2 tracking-widest rounded-lg text-sm text-white uppercase shadow-md transition ease-in-out duration-300 preventSubmitBtn ' . (config('adminlte.class_btn_secondary') ?? '') ]) }}
>
    {{ $value ?? 'Enviar' }}
</button>