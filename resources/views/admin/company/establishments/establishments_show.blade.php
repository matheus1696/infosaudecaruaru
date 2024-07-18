<x-pages.index>
    
    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Lista de Estabelecimento: {{ $db->title }}"
            routeEdit="{{route('establishments.edit',['establishment'=>$db->id])}}"
            routeBack="{{route('establishments.index')}}"
        />
    @endslot

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            @include('admin.company.establishments.partials.show.establishment_show_description')
        </x-conteiner>

        <hr class="py-2">

        <div class="flex justify-between px-2">
            <h3 class="text-lg font-semibold">Departamentos</h3>
            @include('admin.company.establishments.partials.show.establishment_show_department_form')
        </div>
        @include('admin.company.establishments.partials.show.establishment_show_department_table')

    @endslot
</x-pages.index>