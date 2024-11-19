<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Abastecimento" routeBack="{{route('fleet_vehicles.index')}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="create" route="{{route('fleet_vehicles.store_category',['fleet_vehicle'=>$db->id, 'store_category'=>'fuel'])}}">
                @include('fleet.fleet_vehicle.partials.fleet_vehicle_form_fuel')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>
