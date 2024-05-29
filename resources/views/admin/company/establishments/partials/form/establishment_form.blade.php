<x-form.input col="2" label="Código" id="code" name="code" required="required" value="{{$db->code ?? ''}}" />
<x-form.input col="10" label="Nome do Estabelecimento" id="title" name="title" required="required" value="{{$db->title ?? ''}}" />    
<x-form.input col="12" label="Nome Fantasia do Estabelecimento (Apelido)" id="surname" name="surname" required="required" value="{{$db->surname ?? ''}}" />
<x-form.input col="10" label="Logradouro" id="address" name="address" required="required" value="{{$db->address ?? ''}}" />
<x-form.input col="2" label="Número" id="number" name="number" required="required" value="{{$db->number ?? ''}}" />
<x-form.input col="4" label="Bairro" id="district" name="district" required="required" value="{{$db->district ?? ''}}" />

<x-form.select col="4" label="Cidade" id="city_id" name="city_id" required="required">
    @foreach ($dbRegionCities as $item)
        <option value="{{$item->id}}" @isset($db) @if ($db->city_id == $item->id) selected @endif @endisset>
            {{$item->code_ibge}} | {{$item->city}} - {{$item->RegionState->acronym}}
        </option>
    @endforeach
</x-form.select>

<x-form.input col="2" label="Latitude" id="latitude" name="latitude" value="{{$db->latitude ?? ''}}" />
<x-form.input col="2" label="Longitude" id="longitude" name="longitude" value="{{$db->longitude ?? ''}}" />

<x-form.select col="6" label="Tipo de Estabelecimento" id="type_establishment_id" name="type_establishment_id" required="required">
    @foreach ($dbCompanyTypeEstablishments as $item)
        <option value="{{$item->id}}" @isset($db)  @if ($db->type_establishment_id == $item->id) selected @endif @endisset>
            {{$item->title}}
        </option>
    @endforeach
</x-form.select>

<x-form.select col="6" label="Bloco Financeiro" id="financial_block_id" name="financial_block_id" required="required">
    @foreach ($dbCompanyFinancialBlocks as $item)
        <option value="{{$item->id}}" @isset($db)  @if ($db->financial_block_id == $item->id) selected @endif @endisset>
            {{$item->title}}
        </option>
    @endforeach
</x-form.select>