<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Tipo dos Suprimentos" routeBack="{{route('consumable_types.index')}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="edit" route="{{route('consumable_types.update',['consumable_type'=>$db->id])}}">
                @include('admin.consumable.consumable_type.partials.consumable_type_form')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>
