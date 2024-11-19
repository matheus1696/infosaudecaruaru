<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 justify-between">    
    @foreach ($db as $item)
        <a href="{{route('fleet_vehicles.show',['fleet_vehicle'=>$item->id])}}" class="text-white bg-green-700 rounded-lg shadow-md px-3 py-2 hover:bg-green-600">
            <p>Placa: {{$item->license_plate}}</p>
            <p>Fabricante: {{$item->FleetModel->FleetManufacturer->manufacturer}}</p>
            <p>Modelo: {{$item->FleetModel->model}}</p>
            <p>KM Atual: {{$item->current_odometer}}</p>
        </a>
    @endforeach
</div>