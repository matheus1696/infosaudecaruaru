<div>
    <x-form.form-group>
        
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="crm" value="CRM"/>
            <x-form.form-input name="crm" value="{{ old('crm') ?? $db->crm ?? '' }}" maxlength="7" placeholder="999.999" onkeyup="handleCRM(event)" />
            <x-form.error-message for="crm" />
        </div>

        <div class="col-span-12 md:col-span-10">
            <x-form.form-label for="name" value="Nome"/>
            <x-form.form-input name="name" value="{{ old('name') ?? $db->name ?? ''}}" placeholder="Nome Completo" required />
            <x-form.error-message for="name" />
        </div>

        <div class="col-span-12 md:col-span-4">
            <x-form.form-label for="specialty" value="Especialidade"/>
            <x-form.form-select name="specialty">
                <option @isset($db) @if($db->specialty === 'Clinico Geral') selected @endif @endisset value="Clinico Geral">Clinico Geral</option>
                <option @isset($db) @if($db->specialty === 'Pediatra') selected @endif @endisset value="Pediatra">Pediatra</option>
            </x-form.form-select>
            <x-form.error-message for="specialty" />
        </div>
        
        <div class="col-span-12 md:col-span-4">                                    
            <x-form.form-label for="contact_1" value="Contato Principal"/>
            <x-form.form-input name="contact_1" value="{{ old('contact_1') ?? $db->contact_1 ?? '' }}" maxlength="15" minlength="13" placeholder="(00)00000-0000" onkeyup="handlePhone(event)" />
            <x-form.error-message for="contact_1" />
        </div>

        <div class="col-span-12 md:col-span-4">                                    
            <x-form.form-label for="contact_2" value="Contato Opcional"/>
            <x-form.form-input name="contact_2" value="{{ old('contact_1') ?? $db->contact_2 ?? '' }}" maxlength="15" minlength="13" placeholder="(00)00000-0000" onkeyup="handlePhone(event)" />
            <x-form.error-message for="contact_2" />
        </div>

    </x-form.form-group>
</div>
