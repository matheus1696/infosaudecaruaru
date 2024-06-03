<x-form.form method="edit" route="{{route('store_rooms.requestUpdate',['request'=>$db->id])}}">
    <div class="col-span-12 grid grid-cols-1 md:grid-cols-3 gap-3 mb-3">
        <h4 class="md:col-span-3 font-semibold mb-2">Dados do Departamento</h4>
        <p class="text-sm"><strong>Nº da Solicitação: </strong>{{$db->code}}</p>
        <p class="md:col-span-2 text-sm"><strong>Estabelecimento: </strong>{{$db->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</p>
        <p class="text-sm"><strong>Departamento: </strong>{{$db->CompanyEstablishmentDepartment->department}}</p>
        <p class="text-sm">
            <strong>Contato: </strong>
            <input type="tel" id="department_contact" name="department_contact" class="border border-gray-200 rounded-full px-2 ml-1" value="{{$db->department_contact}}" onkeyup="handlePhone(event)" maxlength="14">
        </p>
        <p class="text-sm">
            <strong>Ramal: </strong>
            <input type="text" id="department_extension" name="department_extension" class="border border-gray-200 rounded-full px-2 ml-1" value="{{$db->department_extension}}">
        </p>
    
        <hr class="col-span-3 my-2">
        
        <h4 class="md:col-span-3 font-semibold mb-2">Dados do Usuário Solicitante</h4>
        <p class="text-sm"><strong>Usuário: </strong>{{$db->User->name}}</p>
        <p class="text-sm">
            <strong>Contato 1: </strong>
            <input type="text" id="user_contact_1" name="user_contact_1" class="border border-gray-200 rounded-full px-2 ml-1" value="{{$db->user_contact_1}}" onkeyup="handlePhone(event)" maxlength="15"> 
        </p>
        <p class="text-sm">
            <strong>Contato 2: </strong>
            <input type="text" id="user_contact_2" name="user_contact_2" class="border border-gray-200 rounded-full px-2 ml-1" value="{{$db->user_contact_2}}" onkeyup="handlePhone(event)" maxlength="15">            
        </p>
    </div>
</x-form.form>