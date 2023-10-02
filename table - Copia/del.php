<?php

include "conn.php";

echo 'this is a test';

if(isset($_POST['instituicao'])){

    $instituicao = $_POST['instituicao'];

    $query = "DELETE FROM perfil_territorial WHERE `perfil_territorial`.`instituicao` = '$instituicao'";

    $db->query($query);

    echo $query;
}elseif(isset($_POST['compromisso'])){

    $compromisso = $_POST['compromisso'];

    $query = "DELETE FROM agenda_territorial WHERE `agenda_territorial`.`compromisso` = '$compromisso'";

    $db->query($query);

    echo $query;
}



?>