<!-- Inicio de Componentização Page Index -->
<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Estabelecimento"
            routeBack="{{route('establishments.show',['establishment'=>$db->id])}}"
        />
    @endslot

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="edit" route="{{route('establishments.update',['establishment'=>$db->id])}}">
                @include('admin.company.establishments.partials.form.establishment_form')
            </x-form.form>
        </x-conteiner>
    @endslot
</x-pages.index>