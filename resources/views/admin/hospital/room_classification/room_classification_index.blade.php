<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Classificação dos Leitos"/>
    @endslot
    
    <!-- Slot Body -->
    @slot('body')

        <x-conteiner>
            <form action="{{route('hospital_room_classifications.store')}}" method="post">
                @csrf
                <livewire:admin.hospital.room-classification-form />
                <x-button.btn-primary value="Salvar"/>
            </form>
        </x-conteiner>

        <livewire:admin.hospital.room-classification-table />
    
    @endslot
    
</x-pages.index>