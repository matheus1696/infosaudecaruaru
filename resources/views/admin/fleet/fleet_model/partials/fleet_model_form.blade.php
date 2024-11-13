<x-form.select col="6" label="Fabricante" id="manufacturer_id" name="manufacturer_id"> 
    @foreach ($dbFleetManufacturers as $dbFleetManufacturer)
        <option value="{{$dbFleetManufacturer->id}}" @isset($db) @if ($db->manufacturer_id == $dbFleetManufacturer->id) selected @endif @endisset>
            {{$dbFleetManufacturer->title}}
        </option>
    @endforeach
</x-form.select>

<x-form.input col="6" label="Modelo" id="model" name="model" value="{{$db->model ?? ''}}" />
<x-form.input col="3" label="Suprimento" id="title" name="title" value="{{$db->title ?? ''}}" />


