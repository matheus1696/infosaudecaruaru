<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Apresentação dos Suprimentos" 
            routeCreate="{{ route('consumable_units.create') }}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('admin.consumable.consumable_unit.partials.consumable_unit_table')
    @endslot
</x-pages.index>
