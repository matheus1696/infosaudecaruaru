<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Tipo de Medicamentos" routeCreate="{{ route('medication_types.create') }}"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('admin.medication.medication_type.partials.medication_type_table')
    @endslot
</x-pages.index>
