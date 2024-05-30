<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Lista de Materiais" routeCreate="{{ route('standard_requests.create') }}"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('admin.inventory.warehouse.standard_request.partials.index.standard_request_index_table')
    @endslot
</x-pages.index>