<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Frota de Veículos" routeBack="{{route('fleet_vehicles.show',['fleet_vehicle'=>$db->id])}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="edit" route="{{route('fleet_vehicles.update',['fleet_vehicle'=>$db->id])}}">
                @include('fleet.fleet_vehicle.partials.fleet_vehicle_form_add_vehicle')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>
