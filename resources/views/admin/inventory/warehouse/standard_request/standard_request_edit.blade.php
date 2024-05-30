<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Lista de Materiais" routeBack="{{route('standard_requests.show',['standard_request'=>$db->id])}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="edit" route="{{route('standard_requests.update',['standard_request'=>$db->id])}}">
                @include('admin.inventory.warehouse.standard_request.partials.form.standard_request_form')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>