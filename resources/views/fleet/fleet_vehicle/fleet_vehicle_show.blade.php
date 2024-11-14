<x-pages.index>
    
    <!-- Slot Header -->
    @slot('header')
        <x-header title="{{$db->FleetModel->FleetManufacturer->manufacturer}} {{$db->FleetModel->model}} - Placa {{$db->license_plate}}" routeBack="{{route('fleet_vehicles.index')}}"/>
    @endslot

    <!-- Slot Body -->
    @slot('body')
    
        <x-conteiner>        
            <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-3 text-sm">
                <p><strong>Fabricante: </strong>{{$db->FleetModel->FleetManufacturer->manufacturer}}</p>
                <p><strong>Modelo: </strong>{{$db->FleetModel->model}}</p>
                <p><strong>Motor: </strong>{{$db->FleetModel->engine}}</p>
                <p><strong>Transmissão: </strong>{{$db->FleetModel->transmission}}</p>
                <p><strong>Abastecimento: </strong>{{$db->FleetModel->fuel_type}}</p>
                <p><strong>Placa: </strong>{{$db->license_plate}}</p>
                <p><strong>Cor: </strong>{{$db->color}}</p>
                <p><strong>Ano de Fabricação: </strong>{{$db->year_manufacture}}</p>
                <p><strong>Ano do Modelo: </strong>{{$db->year_models}}</p>
                <p><strong>KM Inicial: </strong>{{$db->inicial_odometer}}</p>
                <p><strong>KM Atual: </strong>{{$db->current_odometer}}</p>
                <p><strong>Posse: </strong>{{$db->owner_status}}</p>
            </div>
        </x-conteiner>

    @endslot
</x-pages.index>