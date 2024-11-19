<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Frota de Veículos" routeCreate="{{ route('fleet_vehicles.create') }}"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('fleet.fleet_vehicle.partials.fleet_vehicle_list_vehicle')
    @endslot
</x-pages.index>
