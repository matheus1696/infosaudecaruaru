<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header title="Classificação do Medicamentos" routeCreate="{{ route('medication_classifications.create') }}"/>
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('admin.medication.medication_classification.partials.medication_classification_table')
    @endslot
</x-pages.index>
