<x-form.select col="6" label="Fabricante" id="manufacturer_id" name="manufacturer_id"> 
    @foreach ($dbFleetManufacturers as $dbFleetManufacturer)
        <option value="{{$dbFleetManufacturer->id}}" @isset($db) @if ($db->manufacturer_id == $dbFleetManufacturer->id) selected @endif @endisset>
            {{$dbFleetManufacturer->manufacturer}}
        </option>
    @endforeach
</x-form.select>

<x-form.input col="6" label="Modelo" id="model" name="model" value="{{$db->model ?? ''}}" />
<x-form.input col="4" label="Potencia Motor" id="engine" name="engine" value="{{$db->engine ?? ''}}" maxlength="3" />

<x-form.select col="4" label="Transmissão" id="transmission" name="transmission">
    <option value="Manual" @isset($db) @if ($db->transmission == 'Manual') selected @endif @endisset>Manual</option>
    <option value="Automático" @isset($db) @if ($db->transmission == 'Automático') selected @endif @endisset>Automático</option>
</x-form.select>

<x-form.select col="4" label="Tipo de Abastecimento" id="fuel_type" name="fuel_type">
    <option value="Flex" @isset($db) @if ($db->fuel_type == 'Flex') selected @endif @endisset>Flex</option>
    <option value="Diesel" @isset($db) @if ($db->fuel_type == 'Diesel') selected @endif @endisset>Diesel</option>
    <option value="Gás Natural" @isset($db) @if ($db->fuel_type == 'Gás Natural') selected @endif @endisset>Gás Natural</option>
    <option value="Híbrido" @isset($db) @if ($db->fuel_type == 'Híbrido') selected @endif @endisset>Híbrido</option>
    <option value="Elétrico" @isset($db) @if ($db->fuel_type == 'Elétrico') selected @endif @endisset>Elétrico</option>
</x-form.select>


