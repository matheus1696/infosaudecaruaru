<!-- Inicio de Componentização da Página Index -->
<x-pages.index>
    @slot('body')
        <div class="grid grid-cols-1 gap-3 mx-2 md:mx-5 md:grid-cols-2 xl:grid-cols-3">
            <div>
                @include('users.profile.partials.form_user_profile')
            </div>
            <div>
                @include('users.profile.partials.form_user_professional')
            </div>
            <div>                
                @include('users.profile.partials.form_user_password')
            </div>
        </div>
    @endslot
</x-pages.index>