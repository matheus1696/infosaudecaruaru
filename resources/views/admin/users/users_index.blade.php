<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Lista de Usuários"/>
    @endslot
    
    <!-- Slot Body -->
    @slot('body')
        <livewire:admin.users.users-table />
    @endslot
    
</x-pages.index>
