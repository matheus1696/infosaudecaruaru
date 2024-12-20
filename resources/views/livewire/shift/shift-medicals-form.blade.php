<div>
    <x-form.form-group>
        
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="start_date" value="Data de Entrada"/>
            <x-form.form-input type="date" name="start_date" value="{{ old('start_date') ?? $db->start_date ?? '' }}" />
            <x-form.error-message for="start_date" />
        </div>

        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="start_time" value="H. Entrada"/>
            <x-form.form-input type="time" name="start_time" value="{{ old('start_time') ?? $db->start_time ?? '' }}" />
            <x-form.error-message for="start_time" />
        </div>
        
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="end_date" value="Data de Saída"/>
            <x-form.form-input type="date" name="end_date" value="{{ old('end_date') ?? $db->end_date ?? '' }}"/>
            <x-form.error-message for="end_date" />
        </div>

        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="end_time" value="H. Saída"/>
            <x-form.form-input type="time" name="end_time" value="{{ old('end_time') ?? $db->end_time ?? '20:00' }}" />
            <x-form.error-message for="end_time" />
        </div>

        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="establishment_id" value="Especialidade"/>
            <x-form.form-select name="establishment_id">
                @foreach ($dbEstablishments as $dbEstablishment)                    
                    <option @isset($db) @if($db->establishment_id === $dbEstablishment->id) selected @endif @endisset value="{{$dbEstablishment->id}}">
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
                    <option @isset($db) @if($db->doctor_id === $dbDoctor->id) selected @endif @endisset value="{{$dbDoctor->id}}">
                        {{$dbDoctor->name}}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.error-message for="doctor_id" />
        </div>

    </x-form.form-group>
</div>
