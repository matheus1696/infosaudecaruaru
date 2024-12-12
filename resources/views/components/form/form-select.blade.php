<select {{ $attributes->merge([ 'class' => 'block w-full px-2 py-1.5 outline-none text-sm rounded-md shadow-sm bg-white border focus:border-green-600' ]) }} >
    <option selected disabled>Selecione</option>
    {{$slot}}
</select>