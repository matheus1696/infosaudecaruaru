<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header title="Modelos de Veículos" routeBack="{{route('fleet_models.index')}}"/>
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="edit" route="{{route('fleet_models.update',['fleet_model'=>$db->id])}}">
                @include('admin.fleet.fleet_model.partials.fleet_model_form')
            </x-form.form>
        </x-conteiner>
    @endslot
    
</x-pages.index>
