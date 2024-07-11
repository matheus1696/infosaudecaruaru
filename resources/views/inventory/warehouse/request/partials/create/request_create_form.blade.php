<x-form.input col="12" label="Título da Solicitação" id="title" name="title" required="required"/>
<hr class="col-span-12">
<p class="col-span-12 font-semibold text-lg">Dados do Estabelecimento</p>
<x-form.input col="6" label="Estabelecimento" id="disabled" name="disabled" disabled="disabled" value="{{$dbDepartment->CompanyEstablishment->title}}"/>
<input hidden name="department_id" value="{{$dbDepartment->id}}">
<x-form.input col="6" label="Departamento" id="disabled" name="disabled" disabled="disabled" value="{{$dbDepartment->department}}"/>
<x-form.input col="6" label="Contato Estabelecimento" id="department_contact" name="department_contact" value="{{$dbDepartment->contact}}"/>
<x-form.input col="6" label="Ramal" id="department_extension" name="department_extension" value="{{$dbDepartment->extension}}"/>
<hr class="col-span-12">
<p class="col-span-12 font-semibold text-lg">Dados do Usuário</p>
<x-form.input col="12" label="Usuário" id="disabled" name="disabled" disabled="disabled" value="{{$dbUser->name}}"/>
<input hidden name="user_id" value="{{$dbUser->id}}">
<x-form.input col="6" label="Contato" id="user_contact_1" name="user_contact_1" value="{{$dbUser->contact_1}}"/>
<x-form.input col="6" label="Contato" id="user_contact_2" name="user_contact_2" value="{{$dbUser->contact_2}}"/>