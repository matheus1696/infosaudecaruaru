<x-pages.index>
    
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Dados do Veículo" routeBack="{{route('fleet_vehicles.index')}}"/>
    @endslot

    <!-- Slot Body -->
    @slot('body')
    
        <x-conteiner>
                
            <h2 class="text-lg mb-3">{{$db->FleetModel->FleetManufacturer->manufacturer}} {{$db->FleetModel->model}} - Placa {{$db->license_plate}}</h2>
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-4 text-sm">
                <p><strong>Fabricante: </strong>{{$db->FleetModel->FleetManufacturer->manufacturer}}</p>
                <p><strong>Modelo: </strong>{{$db->FleetModel->model}}</p>
                <p><strong>Motor: </strong>{{$db->FleetModel->engine}}</p>
                <p><strong>Transmissão: </strong>{{$db->FleetModel->transmission}}</p>
                <p><strong>Abastecimento: </strong>{{$db->FleetModel->fuel_type}}</p>
                <p><strong>Cor: </strong>{{$db->color}}</p>
                <p><strong>Ano de Fabricação: </strong>{{$db->year_manufacture}}</p>
                <p><strong>Ano do Modelo: </strong>{{$db->year_models}}</p>
                <p><strong>Placa: </strong>{{$db->license_plate}}</p>
                <p><strong>Posse: </strong>{{$db->owner_status}}</p>
                <p><strong>KM Inicial: </strong>{{$db->inicial_odometer}}</p>
                <p><strong>KM Atual: </strong>{{$db->current_odometer}}</p>
            </div>

            <hr>

            <div class="flex justify-center items-center gap-3 text-sm mt-4 mb-2">
                <div class="py-5 h-14 w-28 bg-yellow-600 flex flex-col justify-center items-center gap-2 rounded shadow hover:bg-yellow-500 text-gray-100">
                    <i class="fas fa-gas-pump text-lg"></i>
                    <p>Abastecimento</p>
                </div>
                
                <div class="py-5 h-14 w-28 bg-amber-800 flex flex-col justify-center items-center gap-2 rounded shadow hover:bg-amber-700 text-gray-100">
                    <i class="fas fa-oil-can text-lg"></i>
                    <p>Manutenção</p>
                </div>
                
                <div class="py-5 h-14 w-28 bg-red-600 flex flex-col justify-center items-center gap-2 rounded shadow hover:bg-red-700 text-gray-100">
                    <i class="fas fa-receipt text-lg"></i>
                    <p>Despesas</p>
                </div>
                
                <div class="py-5 h-14 w-28 bg-sky-700 flex flex-col justify-center items-center gap-2 rounded shadow hover:bg-sky-600 text-gray-100">
                    <i class="fas fa-check text-lg"></i>
                    <p>Vistoria</p>
                </div>
            </div>
        </x-conteiner>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
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
                <div class="h-[600px] lg:h-96 overflow-y-scroll">
                    <h2 class="text-lg mb-3">Histórico</h2>
                    <div class="pl-2 flex">
                        <div class="flex rounded-full overflow-hidden">
                            <div class="w-3 bg-black border-r border-white border-dotted"></div>
                            <div class="w-3 bg-black"></div>
                        </div>
                        <div class="px-2 w-full">
                            <button class="w-full text-start grid grid-cols-1 text-sm border-b border-zinc-300 py-2 relative">
                                <div class="flex justify-center items-center size-8 rounded-full bg-yellow-600 text-white absolute -left-9 top-4">
                                    <i class="fas fa-gas-pump"></i>
                                </div>
                                <div class="flex items-center">
                                    <i class="w-8 text-center fas fa-tachometer-alt text-gray-300 pr-2"></i>
                                    <p><span class="font-semibold">Odomêtro: </span>102.458</p>
                                </div>
                                <div class="flex items-center">
                                    <i class="w-8 text-center fas fa-gas-pump text-gray-300 pr-2"></i>
                                    <p><span class="font-semibold">Posto: </span>Qualquer posto da cidade</p>
                                </div>
                                <div class="flex items-center">
                                    <i class="w-8 text-center fas fa-burn text-gray-300 pr-2"></i>
                                    <p><span class="font-semibold">Combustivel: </span>G. Comum</p>
                                </div>
                                <div class="flex items-center">
                                    <i class="w-8 text-center fas fa-dollar-sign text-gray-300 pr-2"></i>
                                    <p><span class="font-semibold">Preço /L: </span>R$5,49</p>
                                </div>
                                <div class="flex items-center">
                                    <i class="w-8 text-center fas fa-money-bill-alt text-gray-300 pr-2"></i>
                                    <p><span class="font-semibold">Valor: </span>R$150,00</p>
                                </div>
                                <div class="flex items-center">
                                    <i class="w-8 text-center fas fa-tint text-gray-300 pr-2"></i>
                                    <p><span class="font-semibold">Litros: </span>15.145 L</p>
                                </div>
                            </button>

                            <button class="w-full text-start grid grid-cols-1 text-sm border-b border-zinc-300 py-2 relative">
                                <div class="flex justify-center items-center size-8 rounded-full bg-amber-800 text-white absolute -left-9 top-4">
                                    <i class="fas fa-oil-can"></i>
                                </div>
                                <div class="flex items-center">
                                    <i class="w-8 text-center fas fa-tachometer-alt text-gray-300 pr-2"></i>
                                    <p><span class="font-semibold">Odomêtro: </span>102.458</p>
                                </div>
                                <div class="flex items-center">
                                    <i class="w-8 text-center fas fa-cog text-gray-300 pr-2"></i>
                                    <p><span class="font-semibold">Local: </span>Qualquer oficina da cidade</p>
                                </div>                                
                                <div class="flex items-center">
                                    <i class="w-8 text-center fas fa-oil-can text-gray-300 pr-2"></i>
                                    <p><span class="font-semibold">Serviços: </span>Troca de Óleo (+4)</p>
                                </div>
                                <div class="flex items-center">
                                    <i class="w-8 text-center fas fa-money-bill-alt text-gray-300 pr-2"></i>
                                    <p><span class="font-semibold">Valor: </span>R$150,00</p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </x-conteiner>
        </div>

    @endslot
</x-pages.index>