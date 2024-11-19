<x-form.select col="6" label="Modelo do Veículo" id="model_id" name="model_id"> 
    @foreach ($dbFleetModels as $dbFleetModel)
        <option value="{{$dbFleetModel->id}}" @isset($db) @if ($db->model_id == $dbFleetModel->id) selected @endif @endisset>
            {{$dbFleetModel->FleetManufacturer->manufacturer}} | {{$dbFleetModel->model}} | {{$dbFleetModel->engine}} | {{$dbFleetModel->transmission}} | {{$dbFleetModel->fuel_type}}
        </option>
    @endforeach
</x-form.select>

<x-form.input col="2" label="Placa" id="license_plate" name="license_plate" value="{{$db->license_plate ?? ''}}" />
<x-form.input col="2" label="Cor" id="color" name="color" value="{{$db->color ?? ''}}" />
    
<x-form.select col="2" label="Posse" id="owner_status" name="owner_status">
    <option value="Alugado" @isset($db) @if ($db->owner_status == 'Alugado') selected @endif @endisset>Alugado</option>
    <option value="Próprio" @isset($db) @if ($db->owner_status == 'Próprio') selected @endif @endisset>Próprio</option>
</x-form.select>

<x-form.input col="2" label="Ano de Fabricação" id="year_manufacture" name="year_manufacture" value="{{$db->year_manufacture ?? ''}}" />
<x-form.input col="2" label="Ano do Modelo" id="year_models" name="year_models" value="{{$db->year_models ?? ''}}" />

<x-form.select col="4" label="Unidade Vinculada" id="establishment_id" name="establishment_id"> 
    @foreach ($dbEstablishments as $dbEstablishment)
        <option value="{{$dbEstablishment->id}}" @isset($db) @if ($db->establishment_id == $dbEstablishment->id) selected @endif @endisset>
            {{$dbEstablishment->title}}
        </option>
    @endforeach
</x-form.select>

<x-form.select col="4" label="Vinculo Bloco de Financiamento" id="financial_block_id" name="financial_block_id"> 
    @foreach ($dbFinancialBlocks as $dbFinancialBlock)
        <option value="{{$dbFinancialBlock->id}}" @isset($db) @if ($db->financial_block_id == $dbFinancialBlock->id) selected @endif @endisset>
            {{$dbFinancialBlock->title}}
        </option>
    @endforeach
</x-form.select>


