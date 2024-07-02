<x-pages.index>
    <!-- Slot Header -->
    @slot('header')
        <x-header
            title="{{$dbDepartment->department}} - {{$dbDepartment->CompanyEstablishment->title}}"
            routeJoker="{{route('foodstuff.centers.requestShow',['center'=>$dbDepartment->id])}}" iconJoker="fas fa-list" btnTitleJoker="Atender Solicitações"
            routeCreate="{{route('foodstuff.centers.entryShow',['center'=>$dbDepartment->id])}}" btnTitleCreate="Entrada"
            routeBack="{{route('foodstuff.centers.index')}}"
        />
    @endslot
        
    <!-- Slot Body -->
    @slot('body')
        @include('inventory.foodstuff.center.partials.show.center_show_table')
    @endslot
</x-pages.index>