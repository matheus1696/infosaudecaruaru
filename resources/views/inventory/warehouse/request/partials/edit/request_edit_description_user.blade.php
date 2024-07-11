<div class="grid items-center justify-end grid-cols-12 col-span-12 gap-4 my-3">
    <p class="col-span-12 text-sm md:col-span-4"><strong>Usuário: </strong>{{$db->User->name}}</p>
    <p class="flex items-center col-span-12 text-sm md:col-span-4">
        <strong>Contato 1: </strong>
        @if ($db->status == "Encaminhado")
            {{$db->user_contact_1}}
        @else
            <input type="text" id="user_contact_1" name="user_contact_1" class="px-2 py-1 ml-1 border border-green-100 rounded-lg outline-none {{$db->user_contact_1 == NULL ? 'bg-red-100' : ''}}" value="{{$db->user_contact_1}}" onkeyup="handlePhone(event)" maxlength="15" placeholder="(81) 00000-0000">
        @endif
    </p>
    <p class="flex items-center col-span-12 text-sm md:col-span-4">
        <strong>Contato 2: </strong>
        @if ($db->status == "Encaminhado")
            {{$db->user_contact_2}}
        @else
            <input type="text" id="user_contact_2" name="user_contact_2" class="px-2 py-1 ml-1 border border-green-100 rounded-lg outline-none {{$db->user_contact_2 == NULL ? 'bg-red-100' : ''}}" value="{{$db->user_contact_2}}" onkeyup="handlePhone(event)" maxlength="15" placeholder="(81) 00000-0000">
        @endif
    </p>
</div>