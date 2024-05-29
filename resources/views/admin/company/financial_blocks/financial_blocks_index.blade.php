<x-pages.index>    

    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Lista de Blocos Financeiros" 
            routeCreate="{{ route('financial_blocks.create') }}" btnTitleCreate="Adicionar"
        />
    @endslot
    
    @slot('body')        
        @include('admin.company.financial_blocks.partials.financial_blocks_table')
    @endslot
</x-pages.index>
