<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Medicamentos" routeBack="{{route('medications.index')}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="edit" route="{{route('medications.update',['medication'=>$db->id])}}">
                @include('admin.medication.medication.partials.medication_form')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>
