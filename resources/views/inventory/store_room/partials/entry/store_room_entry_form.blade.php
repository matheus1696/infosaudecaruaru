<x-form.form method="create" route="{{route('inventory_store_room_items.entryStore',['inventory_store_room_item'=>$dbStoreRoom->id])}}" title="Adicionar ao Estoque" color="green">
    <input hidden name="inventory_store_room_id" value="{{$dbStoreRoom->id}}">
    <x-form.select col="10" label="Suprimentos" id="consumable_id" name="consumable_id">
        @foreach ($dbConsumables as $dbConsumable)
            <option value="{{$dbConsumable->id}}">
                {{$dbConsumable->title}}
            </option>
        @endforeach
    </x-form.select>
    <x-form.input col="2" type="number" label="Quantidade" id="quantity" name="quantity"/>
    <x-form.textarea col="12" name="description" value="Entrada Avulsa" />
</x-form.form>

