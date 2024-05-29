<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Classificação de Suprimentos" 
            routeCreate="{{ route('consumable_classifications.create') }}"  btnTitleCreate="Adicionar"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('admin.consumable.consumable_classification.partials.consumable_classification_table')
    @endslot
</x-pages.index>
