<!-- Inicio de Componentização da Página Index -->
<x-pages.index>
    @slot('body')
        <div class="flex justify-center items-center min-h-96 md:mt-40">
            <div class="w-full md:w-2/3 xl:w-1/3">
                @include('users.profile.partials.form_user_password')
            </div>
        </div>
    @endslot
</x-pages.index>