<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Cadastro de {{ucfirst($category)}}" routeBack="{{route('fleet_vehicles.show',['fleet_vehicle'=>$db->id])}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="create" route="{{route('fleet_vehicles.store_category',['fleet_vehicle'=>$db->id, 'store_category'=>$category])}}">
                
                @if ($category === "abastecimento")                    
                    @include('fleet.fleet_vehicle.partials.fleet_vehicle_form_service_fuel')
                @else                    
                    @include('fleet.fleet_vehicle.partials.fleet_vehicle_form_service_variety')
                @endif
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>
