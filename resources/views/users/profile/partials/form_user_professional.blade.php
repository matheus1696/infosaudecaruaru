<!-- Inicio de Componentização do Conteiner -->
<x-conteiner>
    <h3 class="mb-3 text-lg font-semibold text-center">Dados do Profissionais</h3>

    <x-form.form method="edit" route="{{route('profiles.updateProfessional')}}">                
            
            <x-form.input col="12" label="Matricula" name="matriculation" value="{{$db->matriculation}}" maxlength="8" minlength="8" placeholder="99.999-2"/>

            <x-form.inputDisabled col="12" label="Estabelecimento" value="{{$db->CompanyEstablishment->title ?? ''}}" />

            <x-form.inputDisabled col="12" label="Departamento" value="{{$db->CompanyEstablishmentDepartment->department ?? ''}}" />

            <x-form.inputDisabled col="12" label="Cargo" value="{{$db->CompanyOccupation->title ?? ''}}" />

    </x-form.form>
</x-conteiner>