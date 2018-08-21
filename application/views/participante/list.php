<?php

echo br(2).form_open('participante/save','id="participante-form"',array('id'=>$participantes[$sorteado]['id'],'presente'=>1,'sorteado'=>1))
.$participantes[$sorteado]['nome'].' '.$participantes[$sorteado]['sobrenome'].' E-mail: '.$participantes[$sorteado]['email']
.br(2).form_input('item').br(2)
.form_submit('save','Salvar')
.form_close();

echo br(2).form_open('participante/save','id="participante-form"',array('id'=>$participantes[$sorteado]['id'],'presente'=>0,'sorteado'=>0))
.form_submit('save','Ausente')
.form_close();
?>
