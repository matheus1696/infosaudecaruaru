<div>
    <x-form.form-group>
        
        <div class="col-span-12">
            <x-form.form-label for="title" value="Título"/>
            <x-form.form-input name="title" value="{{ old('title') }}"/>
            <x-form.error-message for="title"/>
        </div>

    </x-form.form-group>
</div>
