<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Status dos Leitos"/>
    @endslot
    
    <!-- Slot Body -->
    @slot('body')

        <x-conteiner>
            <form action="{{route('hospital_bed_statuses.store')}}" method="post">
                @csrf
                <livewire:admin.hospital.bed-status-form />
                <x-button.btn-primary value="Salvar"/>
            </form>
        </x-conteiner>

        <livewire:admin.hospital.bed-status-table />
    
    @endslot
    
</x-pages.index>