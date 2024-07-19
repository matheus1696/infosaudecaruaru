<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Almoxarifado de Suprimentos"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')

        @if ($dbStoreRooms === FALSE)
            <div class="flex justify-center items-center">
                <div class="mt-20 h-40 bg-white shadow-lg rounded-xl flex justify-center items-center">
                    <p class="px-10 text-lg font-semibold">Usuário sem vinculo com almoxarifado.</p>
                </div>
            </div>
        @else            
            @include('inventory.store_room.partials.index.store_room_index_table')
        @endif
    @endslot
</x-pages.index>