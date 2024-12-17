<x-form.form-group>
    <div class="col-span-12 md:col-span-2">
        <x-form.form-label for="code" value="Código"/>
        <x-form.form-input name="code" value="{{ old('code') ?? $db->code ?? ''}}" placeholder="123456" required />
        <x-form.error-message for="code" />
    </div>
    
    <div class="col-span-12 md:col-span-10">
        <x-form.form-label for="title" value="Nome da Unidade"/>
        <x-form.form-input name="title" value="{{ old('title') ?? $db->title ?? ''}}" placeholder="Nome Completo" required />
        <x-form.error-message for="title" />
    </div>
    
    <div class="col-span-12">
        <x-form.form-label for="surname" value="Nome Fantasia (Apelido)"/>
        <x-form.form-input name="surname" value="{{ old('surname') ?? $db->surname ?? '' }}" placeholder="Nome Fantasia" />
        <x-form.error-message for="surname" />
    </div>
    
    <div class="col-span-10">
        <x-form.form-label for="address" value="Endereço"/>
        <x-form.form-input name="address" value="{{ old('address') ?? $db->address ?? '' }}" placeholder="Endereço" required />
        <x-form.error-message for="address" />
    </div>
    
    <div class="col-span-2">
        <x-form.form-label for="number" value="Nº"/>
        <x-form.form-input name="number" value="{{ old('number') ?? $db->number ?? '' }}" placeholder="123" required />
        <x-form.error-message for="number" />
    </div>
    
    <div class="col-span-12 md:col-span-4">
        <x-form.form-label for="district" value="Bairro"/>
        <x-form.form-input name="district" value="{{ old('district') ?? $db->district ?? '' }}" placeholder="Bairro" required />
        <x-form.error-message for="district" />
    </div>
    
    <div class="col-span-12 md:col-span-4">
        <x-form.form-label for="city_id" value="Cidade"/>
        <x-form.form-select name="city_id">
            @foreach ($dbRegionCities as $dbRegionCity)
                <option class="hover:bg-green-600" value="{{$dbRegionCity->id}}" @isset($db) @if ($db->city_id == $dbRegionCity->id) selected @endif @endisset >
                    {{$dbRegionCity->code_ibge}} | {{$dbRegionCity->city}} - {{$dbRegionCity->RegionState->acronym}}
                </option>
            @endforeach
        </x-form.form-select>
        <x-form.error-message for="city_id" />
    </div>
    
    <div class="col-span-12 md:col-span-2">
        <x-form.form-label for="latitude" value="Latitude"/>
        <x-form.form-input name="latitude" value="{{ old('latitude') ?? $db->latitude ?? '' }}" placeholder="Latitude" required />
        <x-form.error-message for="latitude" />
    </div>
    
    <div class="col-span-12 md:col-span-2">
        <x-form.form-label for="longitude" value="Longitude"/>
        <x-form.form-input name="longitude" value="{{ old('longitude') ?? $db->longitude ?? '' }}" placeholder="Longitude" required />
        <x-form.error-message for="longitude" />
    </div>
    
    <div class="col-span-6">
        <x-form.form-label for="type_establishment_id" value="Tipo de Estabelecimento"/>
        <x-form.form-select name="type_establishment_id">
            @foreach ($dbCompanyTypeEstablishments as $dbCompanyTypeEstablishment)
                <option class="hover:bg-green-600" value="{{$dbCompanyTypeEstablishment->id}}" @isset($db) @if ($db->type_establishment_id == $dbCompanyTypeEstablishment->id) selected @endif @endisset >
                    {{$dbCompanyTypeEstablishment->title}}
                </option>
            @endforeach
        </x-form.form-select>
        <x-form.error-message for="type_establishment_id" />
    </div>
    
    <div class="col-span-6">
        <x-form.form-label for="financial_block_id" value="Bloco Financeiro"/>
        <x-form.form-select name="financial_block_id">
            @foreach ($dbCompanyFinancialBlocks as $dbCompanyFinancialBlock)
                <option class="hover:bg-green-600" value="{{$dbCompanyFinancialBlock->id}}" @isset($db) @if ($db->financial_block_id == $dbCompanyFinancialBlock->id) selected @endif @endisset >
                    {{$dbCompanyFinancialBlock->title}}
                </option>
            @endforeach
        </x-form.form-select>
        <x-form.error-message for="financial_block_id" />
    </div>
</x-form.form-group>