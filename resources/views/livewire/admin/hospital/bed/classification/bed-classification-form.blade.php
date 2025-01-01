<div>
    <x-form.form-group>
        
        <div class="col-span-12">
            <x-form.form-label for="title" value="Classificação do Leito"/>
            <x-form.form-input name="title" value="{{ old('title') }}" placeholder="Classificação do Leito"/>
            <x-form.error-message for="title"/>
        </div>

    </x-form.form-group>
</div>
