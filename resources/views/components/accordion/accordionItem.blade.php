<div class="accordion-item overflow-hidden border border-gray-300 rounded-lg mb-1 bg-white">
    <div class="accordion-header w-full flex justify-between  items-center bg-gray-200 font-semibold px-3 py-2.5 transition-all duration-1000">
        <h4>{{$title}}</h4>
        <span class="accordion-icon fas fa-chevron-down transition-all duration-1000"></span>
    </div>
    <div class="accordion-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out px-3">
        {{$slot}}
    </div>
</div>