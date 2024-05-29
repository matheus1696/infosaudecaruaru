<x-form.input col="3" label="Código" id="code" name="code" value="{{$db->code ?? ''}}" />
<x-form.input col="9" label="Suprimento" id="title" name="title" value="{{$db->title ?? ''}}" />
<x-form.textarea col="12" label="Descrição do Suprimento" id="description" name="description" value="{{$db->description ?? ''}}"/>

<x-form.select col="4" label="Classificação" id="consumable_classification_id" name="consumable_classification_id"> 
    @foreach ($dbConsumableClassifications as $dbConsumableClassification)
        <option value="{{$dbConsumableClassification->id}}" @isset($db) @if ($db->consumable_classification_id == $dbConsumableClassification->id) selected @endif @endisset>
            {{$dbConsumableClassification->title}}
        </option>
    @endforeach
</x-form.select>

<x-form.select col="4" label="Apresentação" id="consumable_unit_id" name="consumable_unit_id">
    @foreach ($dbConsumableUnits as $dbConsumableUnit)
        <option value="{{$dbConsumableUnit->id}}" @isset($db) @if ($db->consumable_unit_id == $dbConsumableUnit->id) selected @endif @endisset>
            {{$dbConsumableUnit->title}}
        </option>
    @endforeach
</x-form.select>

<x-form.select col="4" label="Tipo do Produto" id="consumable_type_id" name="consumable_type_id">
    @foreach ($dbConsumableTypes as $dbConsumableType)
        <option value="{{$dbConsumableType->id}}" @isset($db) @if ($db->consumable_type_id == $dbConsumableType->id) selected @endif @endisset>
            {{$dbConsumableType->title}}
        </option>
    @endforeach
</x-form.select>

