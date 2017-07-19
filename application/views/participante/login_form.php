<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sorteio</title>
</head>
<body>
    <div id="header">
<?php
if(isset($mensagem))
    echo $mensagem;
echo heading('Sorteio', 1);
?>
</div>
<div id="content">
<?php
echo br(2).form_open('participante/login')
.form_password(array('name'=>'password','required'=>'required'))
.form_submit('login','Entrar')
.form_close();
?>
</div>
</body>
</html>