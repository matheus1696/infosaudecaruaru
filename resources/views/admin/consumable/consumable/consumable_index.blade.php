<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Suprimentos" 
            routeCreate="{{ route('consumables.create') }}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('admin.consumable.consumable.partials.consumable_table')
    @endslot
</x-pages.index>
