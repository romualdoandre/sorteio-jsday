<?php
$sorteado=array_rand($participantes);
echo br(2).form_open('participante/save','id="participante-form"',array('id'=>$participantes[$sorteado]['id']))
.$participantes[$sorteado]['nome'].' '.$participantes[$sorteado]['sobrenome'].' E-mail: '.$participantes[$sorteado]['email']
.br(2)
.form_submit('save','Salvar')
.form_close();
?>
