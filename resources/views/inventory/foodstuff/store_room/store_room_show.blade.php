<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="{{$dbDepartment->department}} - {{$dbDepartment->CompanyEstablishment->title}}"
            routeCreate="{{route('foodstuff.store_rooms.requestShow',['store_room'=>$dbDepartment->id])}}" btnTitleCreate="Solicitações"
            routeBack="{{route('foodstuff.store_rooms.index')}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.foodstuff.store_room.partials.show.store_room_show_table')
    @endslot
</x-pages.index>