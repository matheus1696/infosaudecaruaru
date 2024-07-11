<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Almoxarifado"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')

    
    @if ($dbUser)
        @if ($existWarehouse)
            @include('inventory.warehouse.store_room.partials.index.store_room_index_table')
        @else                       
            <div class="flex justify-center items-center h-80 rounded-xl bg-white shadow-lg w-1/2 m-auto">
                <h2 class="text-center font-semibold text-lg">Não existe almoxarifado cadastrado para está unidade</h2>
            </div>
        @endif
    @else                
        <div class="flex justify-center items-center h-80 rounded-xl bg-white shadow-lg w-1/2 m-auto">
            <h2 class="text-center font-semibold text-lg">Usuário sem vinculo com estabelecimento</h2>
        </div>
    @endif

    @endslot
</x-pages.index>