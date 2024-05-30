<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="{{$db->title}}"
            routeBack="{{route('standard_requests.index')}}"
        />
    @endslot        

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="create" route="{{route('standard_request_lists.store')}}">
                @include('admin.inventory.warehouse.standard_request.partials.show.standard_request_show_form')
            </x-form.form>
        </x-conteiner>
        
        <hr class="mb-2.5">
        
        @include('admin.inventory.warehouse.standard_request.partials.show.standard_request_show_table')

    @endslot
    
</x-pages.index>