<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Apresentação dos Suprimentos" routeBack="{{route('consumable_units.index')}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="create" route="{{route('consumable_units.store')}}">
                @include('admin.consumable.consumable_unit.partials.consumable_unit_form')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>
