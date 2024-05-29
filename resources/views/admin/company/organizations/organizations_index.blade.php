<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header 
        title="Organograma"
        routeCreate="{{ route('organizations.create') }}" btnTitleCreate="Adicionar"/>
    @endslot

    <!-- Slot Body -->
    @slot('body')
        @include('admin.company.organizations.partials.organizations_table')
    @endslot
</x-pages.index>
