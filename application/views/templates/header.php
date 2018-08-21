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
echo heading('Sorteio', 1)
.anchor('participante/view/Feminino', 'Apenas meninas', 'title="Apenas meninas"')
.nbs(5)
.anchor('participante/view', 'Todos', 'title="Todos"')
.nbs(5)
.anchor('participante/sorteados', 'Sorteados', 'title="Sorteados"')
.nbs(5)
.anchor('participante/ausentes', 'Ausentes', 'title="Ausentes"')
.nbs(5)
.anchor('participante/logout', 'Sair', 'title="Sair"');?>
</div>
<div id="content">
