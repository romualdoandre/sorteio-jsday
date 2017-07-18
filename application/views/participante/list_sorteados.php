<ol>
<?php
foreach($participantes as $sorteado){
    echo '<li>'.$sorteado['nome'].' '.$sorteado['sobrenome'].' E-mail: '.$sorteado['email'].'</li>';
}
?>
</ul>