<div class="flex justify-end mb-2">
    <!-- Adicionar Item -->
    <div class="inline-block">
        <!-- Modal toggle -->
        <button data-toggle="modal" data-target="#modal_create_item_consumable_{{$db->department_id}}" class="px-2 py-1 text-xs text-white bg-green-700 rounded-lg shadow-md hover:bg-green-600" type="button">
            <i class="fas fa-plus"></i>
            <span class="ml-1 font-semibold">Add. Fornecedor</span>
        </button>

        <div id="modal_create_item_consumable_{{$db->department_id}}" class="modal fade"  role="dialog" aria-labelledby="modal_label_create_item_consumable_{{$db->department_id}}" aria-hidden="true">
            <div class="text-left modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="text-lg font-semibold modal-title" id="modal_label_create_item_consumable_{{$db->department_id}}">Adicionar Fornecedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="m-4 modal-body">
                        <x-form.form method="create" route="{{route('companies.store')}}" color="green">
                            <x-form.input col="4" label="CNPJ" id="cnpj" name="cnpj" minlength="18" maxlength="19"/>
                            <x-form.input col="8" label="Razão Social" id="title" name="title"/>
                            <x-form.input col="9" label="Endereço" id="address" name="address"/>
                            <x-form.input col="3" label="Número" id="number" name="number"/>
                            <x-form.input col="6" label="Bairro" id="district" name="district"/>
                            <x-form.select col="6" label="Cidade" id="city_id" name="city_id">
                                @foreach ($dbRegionCities as $dbRegionCity)
                                    <option value="{{$dbRegionCity->id}}">
                                        {{$dbRegionCity->city}} - {{$dbRegionCity->RegionState->acronym}}
                                    </option>
                                @endforeach
                            </x-form.select>
                            <x-form.input col="6" type="tel" label="Contato Principal" id="contact_1" name="contact_1"/>
                            <x-form.input col="6" type="tel" label="Contato Auxiliar" id="contact_2" name="contact_2"/>
                            <x-form.input type='email' label="Email Principal" id="email_1" name="email_1"/>
                            <x-form.input type='email' label="Email Auxiliar" id="email_2" name="email_2"/>
                        </x-form.form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<x-form.form method="edit" route="{{route('warehouse.centers.entryStore',['center'=>$db->id])}}" title="Adicionar ao Estoque" color="green">
    
    <x-form.input col="3" label="Nota Fiscal" id="invoice" name="invoice"/>
    <x-form.input col="3" label="O.F." id="supply_order" name="supply_order"/>

    <x-form.select col="3" label="Parcela" id="supply_order_parcel" name="supply_order_parcel">
        @for ($i = 1; $i < 21; $i++)            
            <option value="{{$i}}º Parcela">{{$i}}º Parcela</option>
        @endfor
    </x-form.select>

    <x-form.select col="3" label="Bloco Financiamento" id="financial_block_id" name="financial_block_id">
        @foreach ($dbFinancialBlocks as $dbFinancialBlock)
            <option value="{{$dbFinancialBlock->id}}">
                {{$dbFinancialBlock->title}}
            </option>
        @endforeach
    </x-form.select>
    
    <x-form.select col='5' label="Forcenedor" id="supply_company_id" name="supply_company_id">
        @foreach ($dbSupplyCompanies as $dbSupplyCompany)
            <option value="{{$dbSupplyCompany->id}}">
                {{$dbSupplyCompany->title}}
            </option>
        @endforeach
    </x-form.select>  

    <x-form.select col="5" label="Suprimentos" id="consumable_id" name="consumable_id">
        @foreach ($dbConsumables as $dbConsumable)
            <option value="{{$dbConsumable->id}}">
                {{$dbConsumable->title}}
            </option>
        @endforeach
    </x-form.select>
    <x-form.input col="2" type="number" label="Quantidade" id="quantity" name="quantity" min="1" max="{{$db->quantity}}"/>
</x-form.form>