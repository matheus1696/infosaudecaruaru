<x-button.minButtonModalEdit id="request_details_{{$dbRequestDetail->id}}" title="Alterar quantidade da solicitação do suprimento">
    <x-form.form method="edit" route="{{route('store_rooms.updateItem',['store_room'=>$db->department_id,'request'=>$db->id])}}" title="Alterar Quantidade" color="sky">
        <input hidden id="consumable_id" name="consumable_id" value="{{$dbRequestDetail->consumable_id}}">
        <x-form.input col="9" label="Suprimentos" name="disabled" value="{{$dbRequestDetail->Consumable->title}}" disabled="disabled"/>
        <x-form.input col="3" type="number" label="Quantidade" id="quantity" name="quantity" min="1" value="{{$dbRequestDetail->quantity}}"/>

    </x-form.form>
</x-button.minButtonModalEdit>