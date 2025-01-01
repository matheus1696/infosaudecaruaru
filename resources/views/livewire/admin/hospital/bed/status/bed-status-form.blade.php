<div>
    <x-form.form-group>
        
        <div class="col-span-12">
            <x-form.form-label for="title" value="Status do Leito"/>
            <x-form.form-input name="title" value="{{ old('title') }}" placeholder="Status do Leito"/>
            <x-form.error-message for="title"/>
        </div>

    </x-form.form-group>
</div>
