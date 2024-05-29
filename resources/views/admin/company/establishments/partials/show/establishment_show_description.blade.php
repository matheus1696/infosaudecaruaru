<div class="grid grid-cols-1 gap-3 mb-3 text-sm">    
    <div class="flex flex-col md:flex-row gap-3">        
        <p><strong>CNES: </strong>{{$db->code}}</p>
        <p class="flex-1"><strong>Estabelecimento: </strong>{{$db->title}}</p>  
    </div>  
    <p><strong>Nome Fantasia: </strong>{{$db->title}}</p>
    <p><strong>Endereço: </strong>{{$db->address}}, {{$db->number}}, {{$db->district}}, {{$db->RegionCity->city}} - {{$db->RegionCity->RegionState->acronym}}</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">        
        <p><strong>Tipo de Estabelecimento: </strong>{{$db->TypeEstablishment->title}}</p>
        <p><strong>Nivel de Atenção: </strong>{{$db->FinancialBlock->title}}</p>
    </div>
</div>