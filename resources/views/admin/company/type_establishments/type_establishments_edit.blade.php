<!-- Inicio de Componentização Page Index -->
<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Tipos de Estabelecimento"
            routeBack="{{route('type_establishments.index')}}"
        />
    @endslot

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="edit" route="{{route('type_establishments.update',['type_establishment'=>$db->id])}}">
                @include('admin.company.type_establishments.partials.type_establishments_form')
            </x-form.form>
        </x-conteiner>
    @endslot
</x-pages.index>
