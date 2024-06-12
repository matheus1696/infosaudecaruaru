<div class="grid items-center justify-end grid-cols-12 col-span-12 gap-4 my-3">
    <p class="col-span-12 text-sm md:col-span-4"><strong>Data de Abertura: </strong>{{date('d/m/Y H:i:s',strtotime($db->created_at))}}</p>
    <p class="col-span-12 text-sm md:col-span-4"><strong>Nº da Solicitação: </strong>{{$db->code}}</p>
    <p class="col-span-12 text-sm md:col-span-4"><strong>Status: </strong>{{$db->status}}</p>
    <p class="flex items-center col-span-12 text-sm md:col-span-12">
        <strong>Titulo: </strong>
        @if ($db->status == "Encaminhado")
            {{$db->title}}
        @else
            <input type="text" id="title" name="title" class="flex-1 px-2 py-1 ml-1 border border-green-100 rounded-lg outline-none {{$db->title == NULL ? 'bg-red-100' : ''}}" value="{{$db->title}}">
        @endif
    </p>
    <p class="col-span-12 text-sm md:col-span-12"><strong>Estabelecimento: </strong>{{$db->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</p>
    <p class="col-span-12 text-sm md:col-span-4"><strong>Departamento: </strong>{{$db->CompanyEstablishmentDepartment->department}}</p>
    <p class="flex items-center col-span-12 text-sm md:col-span-4">
        <strong>Contato: </strong>
        @if ($db->status == "Encaminhado")
            {{$db->department_contact}}
        @else                  
            <input type="tel" id="department_contact" name="department_contact" class="px-2 py-1 ml-1 border border-green-100 rounded-lg outline-none {{$db->title == NULL ? 'bg-red-100' : ''}}" value="{{$db->department_contact}}" onkeyup="handlePhone(event)" maxlength="14" placeholder="(81) 0000-0000">
        @endif 
    </p>
    <p class="flex items-center col-span-12 text-sm md:col-span-4">
        <strong>Ramal: </strong>
        @if ($db->status == "Encaminhado")
            {{$db->department_extension}}
        @else                  
            <input type="text" id="department_extension" name="department_extension" class="px-2 py-1 ml-1 border border-green-100 rounded-lg outline-none {{$db->title == NULL ? 'bg-red-100' : ''}}" value="{{$db->department_extension}}" placeholder="0000" maxlength="4">
        @endif 
    </p>
</div>