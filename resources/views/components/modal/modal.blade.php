<div x-data="{ open: false }" class="inline-block">
    <!-- Botão para abrir o modal -->
    <button 
        {{ $attributes->merge([
            'type' => 'button',
            'class' => 'px-2 py-1 m-1 text-xs rounded-lg shadow-md focus:outline-none'
        ]) }}
        @click="open = true"
    >
        <i class="{{ $icon ?? 'fas fa-eye' }} text-inherit"></i>
        @isset($btnTitle) 
            <span class="ml-1 font-semibold text-inherit">{{ $btnTitle }}</span> 
        @endisset
    </button>

    <!-- Modal -->
    <div 
        x-show="open" 
        x-cloak 
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        @click.outside="open = false" 
        class="fixed inset-0 z-[9999] flex items-start justify-center bg-gray-900 bg-opacity-80 pt-16 px-5"
    >
        <!-- Evitar que o clique no corpo do modal feche o modal -->
        <div @click.stop class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-4">
            <!-- Cabeçalho do Modal -->
            <div class="flex justify-between items-center border-b pb-3 px-2">
                <h5 class="text-lg font-semibold" id="modalLabel_{{$id}}">{{ $title }}</h5>
                <button 
                    @click="open = false" 
                    class="text-gray-500 hover:text-gray-700"
                    aria-label="Fechar"
                >
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- Corpo do Modal -->
            <div class="p-4 text-start">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
