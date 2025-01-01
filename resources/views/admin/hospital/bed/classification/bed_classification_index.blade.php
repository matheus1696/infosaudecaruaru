<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Classificação dos Leitos"/>
    @endslot
    
    <!-- Slot Body -->
    @slot('body')

        <x-conteiner>
            <form action="{{route('hospital_bed_classifications.store')}}" method="post">
                @csrf
                <livewire:admin.hospital.bed.classification.bed-classification-form />
                <x-button.btn-primary value="Salvar"/>
            </form>
        </x-conteiner>

        <livewire:admin.hospital.bed.classification.bed-classification-table />
    
    @endslot
    
</x-pages.index>