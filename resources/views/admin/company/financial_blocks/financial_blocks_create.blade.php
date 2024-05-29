<!-- Inicio de Componentização Page Index -->
<x-pages.index>

    <!-- Slot Header -->
    @slot('header')
        <x-header 
            title="Bloco Financeiro"
            routeBack={{route('financial_blocks.index')}}
        />
    @endslot

    <!-- Slot Body -->
    @slot('body')
        <x-conteiner>
            <x-form.form method="create" route="{{route('financial_blocks.store')}}">
                @include('admin.company.financial_blocks.partials.financial_blocks_form')
            </x-form.form>
        </x-conteiner>
    @endslot
</x-pages.index>
