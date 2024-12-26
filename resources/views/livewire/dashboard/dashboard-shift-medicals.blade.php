<div>    
    <div class="p-6 px-4" wire:poll.15s>
        <div class="flex justify-between items-end">
            <h2 class="text-4xl">Plantão Médico</h2>
            <p class="text-xs"><strong>Última Atualização:</strong> {{$dateUpdated}}</p>
        </div>
        <hr>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($dbEstablishments as $dbEstablishment)
                <div class="pt-5">
                    
                    <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6 line-clamp-1">{{ $dbEstablishment->title }}</h1>
    
                    @foreach ($dbShiftMedicals as $dbShiftMedical)
                        @if ($dbEstablishment->id === $dbShiftMedical->establishment_id)
                            <div class="bg-white rounded-lg shadow-md p-6 mb-4 transition-transform transform hover:scale-105 hover:shadow-xl">
                                <div class="mb-4">
                                    <h3 class="text-xl font-semibold text-gray-800 line-clamp-1">{{ $dbShiftMedical->ProfessionalDoctor->name }}</h3>
                                    <p class="text-xs text-gray-700">{{ $dbShiftMedical->ProfessionalDoctor->specialty }}</p>
                                </div>
    
                                <div class="space-y-2 mb-4">
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-calendar-alt mr-2 text-gray-500"></i><strong>Início:</strong> 
                                        {{ \Carbon\Carbon::parse($dbShiftMedical->start_date)->format('d/m/Y H:i') }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        <i class="fas fa-calendar-alt mr-2 text-gray-500"></i><strong>Fim:</strong> 
                                        {{ \Carbon\Carbon::parse($dbShiftMedical->end_date)->format('d/m/Y H:i') }}
                                    </p>
                                </div>
    
                                <div class="flex justify-between items-center text-sm font-semibold">
                                    <span class="text-green-500">{{ $dbShiftMedical->status }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
    
                </div>
            @endforeach
        </div>
    </div>
</div>
