<div class="grid grid-cols-4 gap-4 justify-between">    
    @foreach ($db as $item)
        <div class="text-white bg-green-700 rounded-lg shadow-md">
            <p>Placa: {{$item->license_plate}}</p>
            <p>Fabricante: {{$item->FleetModel->FleetManufacturer->manufacturer}}</p>
            <p>Modelo: {{$item->FleetModel->model}}</p>
            <p>KM Atual: {{$item->current_odometer}}</p>
        </div>
    @endforeach
</div>