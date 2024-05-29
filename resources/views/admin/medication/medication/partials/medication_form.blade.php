<x-form.input col="3" label="Código" id="code" name="code" value="{{$db->code ?? ''}}" />
<x-form.input col="9" label="Medicação" id="title" name="title" value="{{$db->title ?? ''}}" />
<x-form.textarea col="12" label="Descrição do Medicamento" id="description" name="description" value="{{$db->description ?? ''}}"/>

<x-form.select col="4" label="Classificação" id="medication_classification_id" name="medication_classification_id">
    @foreach ($dbMedicationClassifications as $dbMedicationClassification)
        <option value="{{$dbMedicationClassification->id}}" @isset($db) @if ($db->medication_classification_id == $dbMedicationClassification->id) selected @endif @endisset>
            {{$dbMedicationClassification->title}}
        </option>
    @endforeach
</x-form.select>

<x-form.select col="4" label="Apresentação" id="medication_unit_id" name="medication_unit_id">
    @foreach ($dbMedicationUnits as $dbMedicationUnit)
        <option value="{{$dbMedicationUnit->id}}" @isset($db) @if ($db->medication_unit_id == $dbMedicationUnit->id) selected @endif @endisset>
            {{$dbMedicationUnit->title}}
        </option>
    @endforeach
</x-form.select>

<x-form.select col="4" label="Tipo" id="medication_type_id" name="medication_type_id">
    @foreach ($dbMedicationTypes as $dbMedicationType)
        <option value="{{$dbMedicationType->id}}" @isset($db) @if ($db->medication_type_id == $dbMedicationType->id) selected @endif @endisset>
            {{$dbMedicationType->title}}
        </option>
    @endforeach
</x-form.select>

