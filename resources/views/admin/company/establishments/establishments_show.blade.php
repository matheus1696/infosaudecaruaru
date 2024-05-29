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

        <x-conteiner>
            <div>
                @include('admin.company.establishments.partials.show.establishment_show_department_form')
            </div>
        </x-conteiner>
        <hr>
        <div>
            @include('admin.company.establishments.partials.show.establishment_show_department_table')
        </div>

    @endslot
</x-pages.index>