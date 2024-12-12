<select {{ $attributes->merge([ 'class' => 'block w-full px-2 py-1.5 outline-none transition ease-in-out duration-300 text-sm rounded-md shadow-sm bg-white disabled:bg-gray-400 text-gray-800 disabled:text-gray-100 border focus:border-cyan-600' ]) }} >
    <option selected disabled>Selecione</option>
    {{$slot}}
</select>