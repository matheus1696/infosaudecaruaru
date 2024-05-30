<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Lista de Materiais" routeBack="{{route('standard_requests.index')}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="create" route="{{route('standard_requests.store')}}">
                @include('admin.inventory.warehouse.standard_request.partials.form.standard_request_form')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>