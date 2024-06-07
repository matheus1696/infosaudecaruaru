<x-form.form method="edit" route="{{route('store_rooms.requestUpdate',['store_room'=>$db->department_id,'request'=>$db->id])}}" btnHidden="TRUE"> 
        
    <div class="grid items-center justify-end grid-cols-12 col-span-12 gap-3">
        <h4 class="col-span-12 font-semibold">Dados do Departamento</h4>
        <p class="col-span-12 text-sm md:col-span-4"><strong>Nº da Solicitação: </strong>{{$db->code}}</p>
        <p class="flex items-center col-span-12 text-sm md:col-span-8">
            <strong>Titulo: </strong>
            <input type="text" id="title" name="title" class="flex-1 px-2 py-1 ml-1 bg-green-100 rounded-lg outline-none" value="{{$db->title}}">
        </p>
        <p class="col-span-12 text-sm md:col-span-12"><strong>Estabelecimento: </strong>{{$db->CompanyEstablishmentDepartment->CompanyEstablishment->title}}</p>
        <p class="col-span-12 text-sm md:col-span-4"><strong>Departamento: </strong>{{$db->CompanyEstablishmentDepartment->department}}</p>
        <p class="flex items-center col-span-12 text-sm md:col-span-4">
            <strong>Contato: </strong>
            <input type="tel" id="department_contact" name="department_contact" class="px-2 py-1 ml-1 bg-green-100 rounded-lg outline-none" value="{{$db->department_contact}}" onkeyup="handlePhone(event)" maxlength="14" placeholder="(81) 0000-0000">
        </p>
        <p class="flex items-center col-span-12 text-sm md:col-span-4">
            <strong>Ramal: </strong>
            <input type="text" id="department_extension" name="department_extension" class="px-2 py-1 ml-1 bg-green-100 rounded-lg outline-none" value="{{$db->department_extension}}" placeholder="0000" maxlength="4">
        </p>

        <hr class="col-span-12 my-2 col-span-13">
        
        <h4 class="col-span-12 font-semibold">Dados do Usuário Solicitante</h4>
        <p class="col-span-12 text-sm md:col-span-4"><strong>Usuário: </strong>{{$db->User->name}}</p>
        <p class="flex items-center col-span-12 text-sm md:col-span-4">
            <strong>Contato 1: </strong>
            <input type="text" id="user_contact_1" name="user_contact_1" class="px-2 py-1 ml-1 bg-green-100 rounded-lg outline-none" value="{{$db->user_contact_1}}" onkeyup="handlePhone(event)" maxlength="15" placeholder="(81) 00000-0000"> 
        </p>
        <p class="flex items-center col-span-12 mb-3 text-sm md:col-span-4">
            <strong>Contato 2: </strong>
            <input type="text" id="user_contact_2" name="user_contact_2" class="px-2 py-1 ml-1 bg-green-100 rounded-lg outline-none" value="{{$db->user_contact_2}}" onkeyup="handlePhone(event)" maxlength="15" placeholder="(81) 00000-0000">            
        </p>
    </div>    

    <!-- Atualizar dados -->
    <div class="flex flex-row items-center justify-end col-span-12 gap-3 pb-3">
        <div>            
            <button  type="submit" class="text-xs text-white transition duration-300 rounded-lg shadow-md bg-{{$color ?? 'sky'}}-800 hover:bg-{{$color ?? 'sky'}}-600 p-1 preventSubmitBtn">Atualizar Dados</button>
        </div>        
        <div>
            <form action="{{route('store_rooms.requestStatus',['store_room'=>$db->id])}}" method="post" class="d-inline-block">
                @csrf
                <input hidden name="standardRequestDestroy" value="true">
                <button
                    type="submit"
                    class="px-2 py-1 text-xs text-white bg-red-700 rounded-lg shadow-md hover:bg-red-900"
                    onclick="return confirm('Realmente deseja realizar a exclusão de todos os itens adicionados?')"
                >
                    <i class="fas fa-trash"></i>
                    <span class="ml-1 font-semibold">Cancelar Solicitação</span>
                </button>
            </form>
        </div>
    </div>
</x-form.form>