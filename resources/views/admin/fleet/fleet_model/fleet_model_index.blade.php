<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Modelos de Veículos" routeCreate="{{ route('fleet_models.create') }}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('admin.fleet.fleet_model.partials.fleet_model_table')
    @endslot
</x-pages.index>
