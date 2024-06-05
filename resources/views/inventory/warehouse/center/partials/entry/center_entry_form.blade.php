
<x-form.form method="edit" route="{{route('warehouse_centers.entryStore',['warehouse_center'=>$db->id])}}" title="Adicionar ao Estoque" color="green">
    
    <x-form.input col="2" label="Nota Fiscal" id="invoice" name="invoice"/>
    <x-form.input col="2" label="O.F." id="supply_order" name="supply_order"/>
    <x-form.input col="6" label="Fornecedor" id="supply_company" name="supply_company"/>

    <x-form.select col="2" label="Blocos de Financiamentos" id="financial_block_id" name="financial_block_id">
        @foreach ($dbFinancialBlocks as $dbFinancialBlock)
            <option value="{{$dbFinancialBlock->id}}" @isset($db) @if ($db->consumable_id == $dbFinancialBlock->id) selected @endif @endisset>
                {{$dbFinancialBlock->title}}
            </option>
        @endforeach
    </x-form.select>

    <x-form.select col="10" label="Tipo dos Suprimentos" id="consumable_id" name="consumable_id">
        @foreach ($dbConsumables as $dbConsumable)
            <option value="{{$dbConsumable->id}}" @isset($db) @if ($db->consumable_id == $dbConsumable->id) selected @endif @endisset>
                {{$dbConsumable->title}}
            </option>
        @endforeach
    </x-form.select>
    <x-form.input col="2" type="number" label="Quantidade" id="quantity" name="quantity" min="1" max="{{$db->quantity}}"/>
</x-form.form>