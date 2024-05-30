<x-form.input col="9" label="Nome da Lista" id="title" name="title" value="{{$db->title ?? ''}}" />

<x-form.select col="3" label="Tipo dos Suprimentos" id="consumable_type_id" name="consumable_type_id">
    @foreach ($dbConsumableTypes as $dbConsumableType)
        <option value="{{$dbConsumableType->id}}" @isset($db) @if ($db->consumable_type_id == $dbConsumableType->id) selected @endif @endisset>
            {{$dbConsumableType->title}}
        </option>
    @endforeach
</x-form.select>

    