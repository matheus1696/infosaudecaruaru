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
            <form action="{{route('establishments.update',['establishment'=>$db->id])}}" method="post">
                @csrf @method('PUT')
                @include('admin.company.establishments.partials.form.establishment_form')
            </form>
        </x-conteiner>
    @endslot
</x-pages.index>