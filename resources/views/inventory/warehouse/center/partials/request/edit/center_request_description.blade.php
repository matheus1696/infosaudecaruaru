<div class="grid items-center justify-end grid-cols-12 col-span-12 gap-3 mb-3">
    <h4 class="col-span-12 font-semibold">Dados do Departamento</h4>
    <p class="col-span-12 text-sm md:col-span-4"><strong>Nº da Solicitação: </strong>{{$db->code}} ({{$db->count}})</p>
    <p class="col-span-12 text-sm md:col-span-8"><strong>Titulo: </strong>{{$db->title}}</p>
    <p class="col-span-12 text-sm"><strong>Estabelecimento: </strong>{{$db->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</p>
    <p class="col-span-12 text-sm md:col-span-4"><strong>Departamento: </strong>{{$db->CompanyEstablishmentDepartment->department}}</p>
    <p class="col-span-12 text-sm md:col-span-4"><strong>Contato: </strong>{{$db->department_contact}}</p>
    <p class="col-span-12 text-sm md:col-span-4"><strong>Ramal: </strong>{{$db->department_extension}}</p>

    <hr class="col-span-12 my-2 col-span-13">
    
    <h4 class="col-span-12 font-semibold">Dados do Usuário Solicitante</h4>
    <p class="col-span-12 text-sm md:col-span-4"><strong>Usuário: </strong>{{$db->User->name}}</p>
    <p class="col-span-12 text-sm md:col-span-4"><strong>Contato 1: </strong>{{$db->user_contact_1}}</p>
    <p class="col-span-12 mb-3 text-sm md:col-span-4"><strong>Contato 2: </strong>{{$db->user_contact_2}}</p>
</div>