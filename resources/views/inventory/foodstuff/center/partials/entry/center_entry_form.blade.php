
<x-form.form method="edit" route="{{route('foodstuff.centers.entryStore',['center'=>$db->id])}}" title="Adicionar ao Estoque" color="green">
    
    <x-form.input col="2" label="Nota Fiscal" id="invoice" name="invoice"/>
    <x-form.input col="2" label="O.F." id="supply_order" name="supply_order"/>

    <x-form.select col="2" label="Parcela" id="supply_order_parcel" name="supply_order_parcel">
        @for ($i = 1; $i < 21; $i++)            
            <option value="{{$i}}º Parcela">{{$i}}º Parcela</option>
        @endfor
    </x-form.select>

    <x-form.input col="6" label="Fornecedor" id="supply_company" name="supply_company"/>

    <x-form.select col="10" label="Suprimentos" id="consumable_id" name="consumable_id">
        @foreach ($dbConsumables as $dbConsumable)
            <option value="{{$dbConsumable->id}}">
                {{$dbConsumable->title}}
            </option>
        @endforeach
    </x-form.select>
    <x-form.input col="2" type="number" label="Quantidade" id="quantity" name="quantity" min="1" max="{{$db->quantity}}"/>
</x-form.form>