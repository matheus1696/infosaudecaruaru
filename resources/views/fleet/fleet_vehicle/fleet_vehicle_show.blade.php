<x-pages.index>
    
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Dados do Veículo" routeBack="{{route('fleet_vehicles.index')}}"/>
    @endslot

    <!-- Slot Body -->
    @slot('body')
    
        <x-conteiner>
                
            <h2 class="text-lg mb-3">{{$db->FleetModel->FleetManufacturer->manufacturer}} {{$db->FleetModel->model}} - Placa {{$db->license_plate}}</h2>
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

        <div class="grid grid-cols-3 gap-3">
            <x-conteiner class="col-span-2">                
                <div class="h-96">
                    <h2 class="text-lg mb-3">Gráficos</h2>
                    <div>
                        gráfico de Odomêtro por dia <br>
                        gráfico de gasto por dia (Com Abastecimento, Serviços e Despesas)
                    </div>
                </div>
            </x-conteiner>
            <x-conteiner>
                <div class="h-96 overflow-y-scroll">
                    <h2 class="text-lg mb-3">Histórico</h2>
                    <div class="flex">
                        <div class="flex rounded-full overflow-hidden">
                            <div class="w-2.5 bg-black border-r border-white border-dotted"></div>
                            <div class="w-2.5 bg-black"></div>
                        </div>
                        <div class="px-3 w-full">
                            <div class="grid grid-cols-1 text-sm border-b border-zinc-300 py-2">
                                <p>Posto: Qualquer posto da cidade</p>
                                <p>Combustivel: G. Comum (9.758 L)</p>
                                <p>Preço /L: R$5,49</p>
                                <p>Odomêtro: G. Comum (9.758 L)</p>
                            </div>
                            <div class="grid grid-cols-1 text-sm border-b border-zinc-300 py-2">
                                <p>Posto: Qualquer posto da cidade</p>
                                <p>Combustivel: G. Comum (9.758 L)</p>
                                <p>Preço /L: R$5,49</p>
                                <p>Odomêtro: G. Comum (9.758 L)</p>
                            </div>
                            <div class="grid grid-cols-1 text-sm border-b border-zinc-300 py-2">
                                <p>Posto: Qualquer posto da cidade</p>
                                <p>Combustivel: G. Comum (9.758 L)</p>
                                <p>Preço /L: R$5,49</p>
                                <p>Odomêtro: G. Comum (9.758 L)</p>
                            </div>
                            <div class="grid grid-cols-1 text-sm border-b border-zinc-300 py-2">
                                <p>Posto: Qualquer posto da cidade</p>
                                <p>Combustivel: G. Comum (9.758 L)</p>
                                <p>Preço /L: R$5,49</p>
                                <p>Odomêtro: G. Comum (9.758 L)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </x-conteiner>
        </div>

    @endslot
</x-pages.index>