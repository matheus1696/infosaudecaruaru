<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Organograma"
            routeBack="{{route('organizations.index')}}"
        />
    @endslot

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="create" route="{{route('organizations.update',['organization'=>$db->id])}}">
                @include('admin.company.organizations.partials.organizations_form')  
            </x-form.form>
        </x-conteiner>
    @endslot
        
</x-pages.index>
