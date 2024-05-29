<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Apresentação de Medicamentos" routeCreate="{{ route('medication_units.create') }}"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('admin.medication.medication_unit.partials.medication_unit_table')
    @endslot
</x-pages.index>
