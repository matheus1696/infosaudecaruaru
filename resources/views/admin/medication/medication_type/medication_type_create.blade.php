<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Tipo de Medicamentos" routeBack="{{route('medication_types.index')}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="create" route="{{route('medication_types.store')}}">
                @include('admin.medication.medication_type.partials.medication_type_form')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>
