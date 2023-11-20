<?php

include "conn.php";

if(isset($_POST['instituicao'])){
    $rowData = [$_POST['instituicao'], $_POST['localidade'],$_POST['natureza'],$_POST['zona'],$_POST['endereco']] ;
    $columNames = ['instituicao','localidade','natureza','zona','endereco'];
    $id_perfil = $_POST['id_referencia'];
    $query = "UPDATE perfil_territorial set ";
    foreach($rowData as $key){
        $index = array_search($key,$rowData);
        $columName = $columNames[$index];
        $query = $query."$columName = '$key'";

        if(array_search($key, $rowData) + 1 < count($rowData)){
            $query = $query.',';
        }

    }
    $query = $query." where id_perfil = '$id_perfil';";

    $db->query($query);
    echo $query;
}elseif(isset($_POST['compromisso'])){
    $rowData = [$_POST["compromisso"],$_POST["eixo"],$_POST["responsavel"],$_POST["observacao"],$_POST["situacao"]];
    $columNames = ['compromisso','eixo','responsavel','observacao','situacao'];
    $id_agenda = $_POST['id_referencia'];
    $query = "UPDATE agenda_territorial set ";
    foreach($rowData as $key){
        $index = array_search($key,$rowData);
        // echo $index;
        $columName = $columNames[$index];
        $query = $query."$columName = '$key'";

        if(array_search($key, $rowData) + 1 < count($rowData)){
            $query = $query.',';
        }

    }
    $query = $query." where id_agenda = '$id_agenda';";

    $db->query  ($query);
    echo $query;
}elseif(isset($_POST['usuario'])){
    $rowData = [$_POST["email"],$_POST["senha"],$_POST["admin"],$_POST["usuario"]];
    $columNames = ['email','senha','admin','nomeUsuario'];
    $id = $_POST['id_referencia'];
    $query = "UPDATE usuario set ";
    foreach($rowData as $key){
        $index = array_search($key,$rowData);
        $columName = $columNames[$index];
        $query = $query."$columName = '$key'";

        if(array_search($key, $rowData) + 1 < count($rowData)){
            $query = $query.',';
        }

    }
    $query = $query." where id = '$id';";

    $db->query($query);
    echo $query;
}
?>