<!-- Inicio de Componentização Page Index -->
<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Estabelecimento"
            routeBack="{{route('establishments.index')}}"
        />
    @endslot

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="create" route="{{route('establishments.store')}}">
                @include('admin.company.establishments.partials.form.establishment_form')
            </x-form.form>
        </x-conteiner>
    @endslot
</x-pages.index>
