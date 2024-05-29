<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Apresentação de Medicamentos" routeBack="{{route('medication_units.index')}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="create" route="{{route('medication_units.store')}}">
                @include('admin.medication.medication_unit.partials.medication_unit_form')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>
