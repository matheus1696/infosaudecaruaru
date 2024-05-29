<x-pages.index>

    @slot('header')        
        <x-header title="Contatos Ramais Internos"/>
    @endslot

    @slot('body')
        @include('public.contacts.partials.contacts_search')
        
        <div class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
            @foreach ($db as $item)
                @include('public.contacts.partials.contacts_cards')
            @endforeach
        </div>

        <div class="mt-3">
            <p class="text-xs text-center text-secondary">Total de {{ $db->count() }} unidades.</p>
        </div>

    @endslot
</x-pages.index>