
<x-form.form method="edit" route="{{route('store_rooms.entryStore',['store_room'=>$db->id])}}" title="Adicionar ao Estoque" color="green">

    <x-form.select col="10" label="Tipo dos Suprimentos" id="consumable_id" name="consumable_id">
        @foreach ($dbConsumables as $dbConsumable)
            <option value="{{$dbConsumable->id}}" @isset($db) @if ($db->consumable_id == $dbConsumable->id) selected @endif @endisset>
                {{$dbConsumable->title}}
            </option>
        @endforeach
    </x-form.select>
    <x-form.input col="2" type="number" label="Quantidade" id="quantity" name="quantity" min="1" max="{{$db->quantity}}"/>
</x-form.form>