<!-- Inicio de Componentização do Conteiner -->
<x-conteiner>
    <h3 class="mb-3 text-lg font-semibold text-center">Dados do Profissionais</h3>

    <x-form.form method="edit" route="{{route('profiles.update',['profile'=>$db->id])}}">                
            
            <x-form.input col="12" label="Matricula" name="registration" id="registration" value="{{$db->registration}}" maxlength="8" minlength="8" placeholder="99.999-2"/>

            <x-form.input col="12" label="Estabelecimento" name="disabled" id="disabled" value="{{$db->CompanyEstablishment->title ?? ''}}" disabled="disabled" />

            <x-form.input col="12" label="Departamento" name="disabled" id="disabled" value="{{$db->CompanyEstablishmentDepartment->department ?? ''}}" disabled="disabled" />

            <x-form.input col="12" label="Cargo" name="disabled" id="disabled" value="{{$db->CompanyOccupation->title ?? ''}}" disabled="disabled" />

    </x-form.form>
</x-conteiner>