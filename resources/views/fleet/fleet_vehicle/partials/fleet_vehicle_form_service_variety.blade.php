<x-form.input col="2" type="date" label="Data" id="date" name="date" value="{{$db->date ?? date('Y-m-d')}}" />
<x-form.input col="2" type="time" label="Hora" id="hour" name="hour" value="{{$db->hour ?? date('H:i')}}" />
<x-form.input col="2" type="number" label="Odomêtro" id="odometer" name="odometer" min="{{$db->current_odometer}}" value="{{$db->current_odometer ?? ''}}" />

<x-form.select col="6" label="Local" id="establishment" name="establishment">
    <option value="Posto de Gasolina Zé Bila" @isset($db) @if ($db->establishment == 'Posto de Gasolina Zé Bila') selected @endif @endisset>Posto de Gasolina Zé Bila</option>
</x-form.select>

<x-form.select col="4" label="Tipo de Manutenção" id="category_description" name="category_description">    
    <option value="Preventiva" @isset($db) @if ($db->establishment == 'Preventiva') selected @endif @endisset>Preventiva</option>
    <option value="Corretiva" @isset($db) @if ($db->establishment == 'Corretiva') selected @endif @endisset>Corretiva</option>
</x-form.select>

<x-form.input col="12" label="Motivo" id="motive" name="motive" value="{{$db->motive ?? ''}}" />
    
<x-form.textarea col="12" label="Observação" id="description" name="description" value="{{$db->description ?? ''}}" />