<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="{{$dbDepartment->department}} - {{$dbDepartment->CompanyEstablishment->title}}"
            routeCreate="{{route('store_rooms.requestShow',['store_room'=>$dbDepartment->id])}}" btnTitleCreate="Solicitações"
            routeBack="{{route('store_rooms.index')}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.warehouse.store_room.partials.show.store_room_show_table')
    @endslot
</x-pages.index>