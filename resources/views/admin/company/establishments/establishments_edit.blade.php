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
                <livewire:admin.company.establishments.establishments-form :dbEstablishment='$db->id' />

                <x-button.btn-secondary value="Salvar Alterações"/>
            </form>
        </x-conteiner>
    @endslot
</x-pages.index>