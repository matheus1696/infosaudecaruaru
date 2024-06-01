<x-form.form method="edit" route="{{route('store_rooms.requestCreate',['store_room'=>$dbDepartment->id])}}" title="Adicionar ao Estoque" color="green">
    <x-form.input col="2" type="number" label="Quantidade" id="quantity" name="quantity" min="1" max="1"/>
</x-form.form>