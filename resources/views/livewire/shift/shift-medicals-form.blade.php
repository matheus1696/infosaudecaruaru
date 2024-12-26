<div>
    <x-form.form-group>

        <div class="col-span-12 flex justify-end items-center gap-2 text-white text-xs">
            <p>Turno: </p>
            <div class="px-2 py-1.5 bg-yellow-500 hover:bg-yellow-600 rounded-lg shadow-lg" wire:click="goToDiurnal"><i class="fas fa-sun"></i></div>
            <div class="px-2 py-1.5 bg-gray-700 hover:bg-gray-800 rounded-lg shadow-lg" wire:click="goToNocturnal"><i class="fas fa-moon"></i></div>
        </div>
        
        <div class="col-span-12 md:col-span-3 lg:col-span-2">
            <x-form.form-label for="start_date" value="Data de Entrada"/>
            <x-form.form-input type="datetime-local" name="start_date" value="{{ $startDate }}" min="{{ now()->subDays(7)->format('Y-m-d\TH:i') }}" wire:model.live="startDate"/>
            <x-form.error-message for="start_date"/>
        </div>
        
        <div class="col-span-12 md:col-span-3 lg:col-span-2">
            <x-form.form-label for="end_date" value="Data de Saída"/>
            <x-form.form-input type="datetime-local" name="end_date" value="{{ $endDate }}" min="{{$startDate}}" wire:model.live="endDate"/>
            <x-form.error-message for="end_date" />
        </div>

        <div class="col-span-12 md:col-span-3 lg:col-span-4">
            <x-form.form-label for="establishment_id" value="Unidade"/>
            <x-form.form-select name="establishment_id">
                @foreach ($dbEstablishments as $dbEstablishment)                    
                    <option @isset($db) @if($db->establishment_id === $dbEstablishment->id) selected @endif @endisset value="{{$dbEstablishment->id}}">
                        {{$dbEstablishment->title}}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.error-message for="establishment_id" />
        </div>

        <div class="col-span-12 md:col-span-3 lg:col-span-4">
            <x-form.form-label for="doctor_id" value="Profissional"/>
            <x-form.form-select name="doctor_id">
                @foreach ($dbDoctors as $dbDoctor)                    
                    <option @isset($db) @if($db->doctor_id === $dbDoctor->id) selected @endif @endisset value="{{$dbDoctor->id}}">
                        {{$dbDoctor->name}}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.error-message for="doctor_id" />
        </div>

    </x-form.form-group>
</div>
