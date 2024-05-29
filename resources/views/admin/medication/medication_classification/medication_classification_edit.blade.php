<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Classificação do Medicamento" routeBack="{{route('medication_classifications.index')}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="edit" route="{{route('medication_classifications.update',['medication_classification'=>$db->id])}}">
                @include('admin.medication.medication_classification.partials.medication_classification_form')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>
