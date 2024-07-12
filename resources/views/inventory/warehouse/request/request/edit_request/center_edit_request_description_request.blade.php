<div class="grid items-center justify-end grid-cols-12 col-span-12 gap-4 my-3">
    <p class="col-span-12 text-sm md:col-span-4"><strong>Data de Abertura: </strong>{{date('d/m/Y H:i:s',strtotime($db->created_at))}}</p>
    <p class="col-span-12 text-sm md:col-span-4"><strong>Nº da Solicitação: </strong>{{$db->code}}</p>
    <p class="col-span-12 text-sm md:col-span-4"><strong>Status: </strong>{{$db->status}}</p>
    <p class="flex items-center col-span-12 text-sm md:col-span-12"><strong>Titulo: </strong>{{$db->title}}</p>
    <p class="col-span-12 text-sm md:col-span-12"><strong>Estabelecimento: </strong>{{$db->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</p>
    <p class="col-span-12 text-sm md:col-span-4"><strong>Departamento: </strong>{{$db->CompanyEstablishmentDepartment->department}}</p>
    <p class="flex items-center col-span-12 text-sm md:col-span-4"><strong>Contato: </strong>{{$db->department_contact}}</p>
    <p class="flex items-center col-span-12 text-sm md:col-span-4"><strong>Ramal: </strong>{{$db->department_extension}}</p>
</div>