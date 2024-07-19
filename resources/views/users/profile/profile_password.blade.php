<!-- Inicio de Componentização da Página Index -->
<x-pages.index>
    @slot('body')
        <div class="flex justify-center items-center h-96 mt-40">
            <div class="w-1/2">             
                @include('users.profile.partials.form_user_password')
            </div>
        </div>
    @endslot
</x-pages.index>