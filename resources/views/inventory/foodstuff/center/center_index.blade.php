<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Gêneros Alimentícios"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.foodstuff.center.partials.index.center_index_table')
    @endslot
</x-pages.index>