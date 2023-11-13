<?php

include "conn.php";

if(isset($_POST['instituicao'])){

    $instituicao = $_POST['instituicao'];

    $query = "DELETE FROM perfil_territorial WHERE `perfil_territorial`.`id_perfil` = '$instituicao'";

    $db->query($query);

    echo $query;
}elseif(isset($_POST['compromisso'])){

    $compromisso = $_POST['compromisso'];

    $query = "DELETE FROM agenda_territorial WHERE `agenda_territorial`.`id_agenda` = '$compromisso'";

    $db->query($query);

    echo $query;
}elseif(isset($_POST['admin'])){

    $usuario = $_POST['admin'];
    // echo '<script>Console.log("$compromisso")</script>';

    $query = "DELETE FROM usuario WHERE `id` = '$usuario'";

    $db->query($query);

    echo $query;
}
?>