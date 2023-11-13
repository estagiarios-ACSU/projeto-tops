<?php

include "conn.php";

if(isset($_POST['natureza'])){
    $rowData = [$_POST['instituicao'], $_POST['localidade'],$_POST['natureza'],$_POST['zona'],$_POST['endereco']];

    $query = "INSERT INTO perfil_territorial VALUES(null,";
    foreach($rowData as $key){
        $query = $query."'$key'";

        if(array_search($key, $rowData) + 1 < count($rowData)){
            $query = $query.',';
        }
    }
    $query = $query.",1);";

    $db->query($query);
    echo $query;
}elseif(isset($_POST['compromissos'])){
    $rowData = [$_POST["compromissos"],$_POST["eixo"],$_POST["responsavel"],$_POST["observacao"],$_POST["situacao"]];

    $query = "INSERT INTO agenda_territorial VALUES(null,";
    foreach($rowData as $key){
        $query = $query."'$key'";

        if(array_search($key, $rowData) + 1 < count($rowData)){
            $query = $query.',';
        }
    }
    $query = $query.",1);";

    $db->query($query);
    echo $query;
}elseif(isset($_POST['usuario'])){
    $rowData = [$_POST["email"],$_POST["senha"],$_POST["admin"],$_POST["usuario"]];

    $query = "INSERT INTO usuario VALUES(null,";
    foreach($rowData as $key){
        $query = $query."'$key'";

        if(array_search($key, $rowData) + 1 < count($rowData)){
            $query = $query.',';
        }
    }
    $query = $query.");";

    $db->query($query);
    echo $query;
}




?>