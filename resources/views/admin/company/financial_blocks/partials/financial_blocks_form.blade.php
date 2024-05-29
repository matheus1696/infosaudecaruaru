<x-form.input col="2" label="Sigla" id="acronym" name="acronym" value="{{$db->acronym ?? ''}}"/>
<x-form.input col="10" label="Blocos Financeiros" id="title" name="title" value="{{$db->title ?? ''}}"/>

<div class="grid items-center justify-center grid-cols-12 col-span-12">    
    <label class="col-span-12">Cores:</label>
    <div class="flex items-center justify-center gap-1">
        <input type="radio" id="colorDanger" name="color" value="bg-red-600" @isset($db) @if ($db->color === "bg-red-600") checked @endif @endisset>
        <label for="colorDanger" class="mt-1 text-sm text-red-600">Vermelho</label>
    </div>
    
    
    <div class="flex items-center justify-center gap-1">
        <input type="radio" id="colorSuccess" name="color" value="bg-green-600" @isset($db) @if ($db->color === "bg-green-600") checked @endif @endisset>
        <label for="colorSuccess" class="mt-1 text-sm text-green-600">Verde</label>
    </div>
    
    <div class="flex items-center justify-center gap-1">
        <input type="radio" id="colorWarning" name="color" value="bg-yellow-600" @isset($db) @if ($db->color === "bg-yellow-600") checked @endif @endisset>
        <label for="colorWarning" class="mt-1 text-sm text-yellow-600">Amarelo</label>
    </div>
    
    <div class="flex items-center justify-center gap-1">
        <input type="radio" id="colorIndigo" name="color" value="bg-indigo-600" @isset($db) @if ($db->color === "bg-indigo-600") checked @endif @endisset>
        <label for="colorIndigo" class="mt-1 text-sm text-indigo-600">Lilas</label>
    </div>
    
    <div class="flex items-center justify-center gap-1">
        <input type="radio" id="colorPrimary" name="color" value="bg-blue-600" @isset($db) @if ($db->color === "bg-blue-600") checked @endif @endisset>
        <label for="colorPrimary" class="mt-1 text-sm text-blue-600">Azul</label>
    </div>
    
    <div class="flex items-center justify-center gap-1">
        <input type="radio" id="colorSecondary" name="color" value="bg-gray-600" @isset($db) @if ($db->color === "bg-gray-600") checked @endif @endisset>
        <label for="colorSecondary" class="mt-1 text-sm text-gray-600">Cinza</label>
    </div>
    
    <div class="flex items-center justify-center gap-1">
        <input type="radio" id="colorOrange" name="color" value="bg-orange-600" @isset($db) @if ($db->color === "bg-orange-600") checked @endif @endisset>
        <label for="colorOrange" class="mt-1 text-sm text-orange-600">Laranja</label>
    </div>
</div>