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
            <form action="{{route('establishments.store')}}" method="post">
                @csrf
                <livewire:admin.company.establishments.establishments-form />
            </form>
        </x-conteiner>
    @endslot
</x-pages.index>
