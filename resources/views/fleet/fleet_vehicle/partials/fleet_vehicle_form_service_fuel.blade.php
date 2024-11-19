<x-form.input col="2" type="date" label="Data" id="date" name="date" value="{{$db->date ?? date('Y-m-d')}}" />
<x-form.input col="2" type="time" label="Hora" id="hour" name="hour" value="{{$db->hour ?? date('H:i')}}" />
<x-form.input col="2" type="number" label="Odomêtro" id="odometer" name="odometer" min="{{$db->current_odometer}}" value="{{$db->current_odometer ?? ''}}" />

<x-form.select col="6" label="Local" id="establishment" name="establishment">
    <option value="Posto de Gasolina Zé Bila" @isset($db) @if ($db->category_description == 'Posto de Gasolina Zé Bila') selected @endif @endisset>Posto de Gasolina Zé Bila</option>
</x-form.select>

<x-form.select col="4" label="Combustível" id="category_description" name="category_description">    
    <option value="Gasolina" @isset($db) @if ($db->establishment == 'Gasolina') selected @endif @endisset>Gasolina</option>
    <option value="Alcool" @isset($db) @if ($db->establishment == 'Alcool') selected @endif @endisset>Alcool</option>
    <option value="Gás Natural" @isset($db) @if ($db->establishment == 'Gás Natural') selected @endif @endisset>Gás Natural</option>
    <option value="Diesel" @isset($db) @if ($db->establishment == 'Diesel') selected @endif @endisset>Diesel</option>
</x-form.select>

<x-form.input col="2" type="number" label="Preço/L" id="value_unit" name="value_unit" value="{{$db->value_unit ?? ''}}" />

<x-form.input col="2" type="number" label="Valor" id="value_total" name="value_total" value="{{$db->value_total ?? ''}}" />

<x-form.input col="12" label="Motivo" id="motive" name="motive" value="{{$db->motive ?? ''}}" />
    
<x-form.textarea col="12" label="Observação" id="description" name="description" value="{{$db->description ?? ''}}" />