<?php

    require_once('controller/controllerFale_conosco.php');

    $controller_fale_conosco = new ControllerFale_conosco();

    $registro =  $controller_fale_conosco->getById($_GET['id_fale_conosco']);
    
    echo($registro->getNome().";".$registro->getEmail().";".$registro->getCelular().";".$registro->getMensagem());


 ?>