<div>
    <x-form.form-group>
        
        <div class="col-span-12 md:col-span-3 lg:col-span-2">
            <x-form.form-label for="start_date" value="Data de Entrada"/>
            <x-form.form-input type="datetime-local" name="start_date" value="{{ old('start_date') ?? $db->start_date ?? '' }}" min="{{ now()->subDays(7)->format('Y-m-d\TH:i') }}" wire:model.live="startDate"/>
            <x-form.error-message for="start_date"/>
        </div>
        
        <div class="col-span-12 md:col-span-3 lg:col-span-2">
            <x-form.form-label for="end_date" value="Data de Saída"/>
            <x-form.form-input type="datetime-local" name="end_date" value="{{ old('end_date') ?? $db->end_date ?? '' }}" min="{{$startDate}}"/>
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
