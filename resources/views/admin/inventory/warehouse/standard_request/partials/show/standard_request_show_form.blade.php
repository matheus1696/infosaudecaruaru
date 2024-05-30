<input hidden name="standard_request_id" value="{{$db->id}}">

<x-form.select col="10" label="Suprimentos" id="consumable_id" name="consumable_id">
    @foreach ($dbConsumables as $dbConsumable)
        <option value="{{$dbConsumable->id}}" @isset($db) @if ($db->consumable_id == $dbConsumable->id) selected @endif @endisset>
            {{$dbConsumable->title}}
        </option>
    @endforeach
</x-form.select>

<x-form.input col="2" label="Quantidade" id="quantity" name="quantity" value="{{$db->quantity ?? ''}}" />

