<div class="col-span-12 md:col-span-{{$col ?? '12'}}">
    <label class="ml-1 text-sm">{{$label ?? ""}}</label>
    <div class="w-full px-2 py-2 text-sm border border-gray-800 rounded-md bg-gray-200">
        <p>{{$value == "" ? $label : $value}}</p>
    </div>
</div>