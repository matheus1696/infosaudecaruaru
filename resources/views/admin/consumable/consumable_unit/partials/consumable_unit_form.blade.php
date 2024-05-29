<x-form.input col="3" label="Sigla" id="code" name="code" value="{{$db->code ?? ''}}" />
<x-form.input col="9" label="Tipo de Apresentação" id="title" name="title" value="{{$db->title ?? ''}}" />
<x-form.textarea col="12" label="Descrição do Suprimento" id="description" name="description" value="{{$db->description ?? ''}}"/>