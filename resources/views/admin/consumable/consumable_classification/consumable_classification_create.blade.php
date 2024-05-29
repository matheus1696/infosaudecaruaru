<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Classificação de Suprimentos" routeBack="{{route('consumable_classifications.index')}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="create" route="{{route('consumable_classifications.store')}}">
                @include('admin.consumable.consumable_classification.partials.consumable_classification_form')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>