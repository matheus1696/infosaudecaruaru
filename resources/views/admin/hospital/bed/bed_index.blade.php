<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Gestão dos Leitos"/>
    @endslot
    
    <!-- Slot Body -->
    @slot('body')

        <livewire:admin.hospital.bed.bed-table />
    
    @endslot
    
</x-pages.index>