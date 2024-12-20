<div>
    <x-table.table>
        @slot('search')
            <div class="flex justify-between gap-2 py-3">

                <div class="w-60">
                    <x-form.form-select wire:model.live="searchEstablishment">
                        <option value="" selected>Todos</option>
                        @foreach ($dbEstablishments as $dbEstablishment)
                            <option value="{{ $dbEstablishment->id }}">{{ $dbEstablishment->title }}</option>
                        @endforeach
                    </x-form.form-select>
                </div>

                <!-- Filtros de Pesquisa -->
                <div class="flex gap-2 w-56">
                    <button class="px-3.5 text-sm rounded-md shadow-sm bg-white text-gray-800  border border-solid-300"
                        wire:click="goToPreviousDate">
                        <i class="fas fa-angle-left"></i>
                    </button>

                    <x-form.form-input type="date" wire:model.live.debounce.500ms="searchDate" />

                    <button class="px-3.5 text-sm rounded-md shadow-sm bg-white text-gray-800  border border-solid-300"
                        wire:click="goToNextDate">
                        <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>
        @endslot
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-16 md:w-20" colspan="2">Data de Entrada</x-table.th>
            <x-table.th class="w-16 md:w-20" colspan="2">Data Saída</x-table.th>
            <x-table.th>Unidade</x-table.th>
            <x-table.th>Nome do Profissional</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbShiftMedicals as $dbShiftMedical)
                <x-table.tr>
                    <x-table.td>{{ date('d/m/Y', strtotime($dbShiftMedical->start_date)) }}</x-table.td>
                    <x-table.td>{{ date('H:i', strtotime($dbShiftMedical->start_time)) }}</x-table.td>
                    <x-table.td>{{ date('d/m/Y', strtotime($dbShiftMedical->end_date)) }}</x-table.td>
                    <x-table.td>{{ date('H:i', strtotime($dbShiftMedical->end_time)) }}</x-table.td>
                    <x-table.td>{{ $dbShiftMedical->CompanyEstablishment->title }}</x-table.td>
                    <x-table.td>{{ $dbShiftMedical->ProfessionalDoctor->name }}</x-table.td>
                    <x-table.td>
                        <x-modal.modal id="ShiftMedical{{ $dbShiftMedical->id }}" title="Alterar dados do Plantonista" icon="fas fa-pen"
                            class="bg-yellow-400">
                            <form action="{{ route('shift_medicals.update', ['shift_medical' => $dbShiftMedical->id]) }}" method="post">
                                @csrf @method('PUT')                                
                                <x-form.form-group>
                                    
                                    <div class="col-span-12 md:col-span-2">
                                        <x-form.form-label for="start_date" value="Data de Entrada"/>
                                        <x-form.form-input type="date" name="start_date" value="{{ old('start_date') ?? $dbShiftMedical->start_date ?? '' }}" />
                                        <x-form.error-message for="start_date" />
                                    </div>

                                    <div class="col-span-12 md:col-span-2">
                                        <x-form.form-label for="start_time" value="H. Entrada"/>
                                        <x-form.form-input type="time" name="start_time" value="{{ old('start_time') ?? $dbShiftMedical->start_time ?? '' }}" />
                                        <x-form.error-message for="start_time" />
                                    </div>
                                    
                                    <div class="col-span-12 md:col-span-2">
                                        <x-form.form-label for="end_date" value="Data de Saída"/>
                                        <x-form.form-input type="date" name="end_date" value="{{ old('end_date') ?? $dbShiftMedical->end_date ?? '' }}"/>
                                        <x-form.error-message for="end_date" />
                                    </div>

                                    <div class="col-span-12 md:col-span-2">
                                        <x-form.form-label for="end_time" value="H. Saída"/>
                                        <x-form.form-input type="time" name="end_time" value="{{ old('end_time') ?? $dbShiftMedical->end_time ?? '20:00' }}" />
                                        <x-form.error-message for="end_time" />
                                    </div>

                                    <div class="col-span-12 md:col-span-2">
                                        <x-form.form-label for="establishment_id" value="Unidade"/>
                                        <x-form.form-select name="establishment_id">
                                            @foreach ($dbEstablishments as $dbEstablishment)                    
                                                <option @isset($dbShiftMedical) @if($dbShiftMedical->establishment_id === $dbEstablishment->id) selected @endif @endisset value="{{$dbEstablishment->id}}">
                                                    {{$dbEstablishment->title}}
                                                </option>
                                            @endforeach
                                        </x-form.form-select>
                                        <x-form.error-message for="establishment_id" />
                                    </div>

                                    <div class="col-span-12 md:col-span-2">
                                        <x-form.form-label for="doctor_id" value="Profissional"/>
                                        <x-form.form-select name="doctor_id">
                                            @foreach ($dbDoctors as $dbDoctor)                    
                                                <option @isset($dbShiftMedical) @if($dbShiftMedical->doctor_id === $dbDoctor->id) selected @endif @endisset value="{{$dbDoctor->id}}">
                                                    {{$dbDoctor->name}}
                                                </option>
                                            @endforeach
                                        </x-form.form-select>
                                        <x-form.error-message for="doctor_id" />
                                    </div>

                                </x-form.form-group>
                                <x-button.btn-secondary value="Salvar Alteração"/>
                            </form>
                        </x-modal.modal>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
