<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Tipo dos Suprimentos" 
            routeCreate="{{ route('consumable_types.create') }}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('admin.consumable.consumable_type.partials.consumable_type_table')
    @endslot
</x-pages.index>
