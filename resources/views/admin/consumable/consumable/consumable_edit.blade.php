<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Suprimentos" routeBack="{{route('consumables.index')}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="edit" route="{{route('consumables.update',['consumable'=>$db->id])}}">
                @include('admin.consumable.consumable.partials.consumable_form')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>
