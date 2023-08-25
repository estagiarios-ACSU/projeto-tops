<?php

include "conn.php";

if(isset($_POST['instituicao'])){

    $instituicao = $_POST['instituicao'];

    $query = "DELETE FROM perfil_territorial WHERE `perfil_territorial`.`instituicao` = '$instituicao'";

    $db->query($query);
    echo $_POST['instituicao'];
}



?>