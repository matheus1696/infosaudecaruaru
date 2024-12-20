<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Plantões Médicos"/>
    @endslot
    
    <!-- Slot Body -->
    @slot('body')

        <div x-data="{ cadShow:true }">
            <x-conteiner>
                <form action="{{route('shift_medicals.store')}}" method="post">
                    @csrf
                    <livewire:shift.shift-medicals-form />
                    <x-button.btn-primary value="Salvar"/>
                </form>
            </x-conteiner>
        </div>
    
        <hr>

        <livewire:shift.shift-medicals-table />
    
    @endslot
    
</x-pages.index>