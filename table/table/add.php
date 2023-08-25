<?php

include "conn.php";

if(isset($_POST['natureza'])){
    $rowData = [$_POST['instituicao'], $_POST['localidade'],$_POST['natureza'],$_POST['zona'],$_POST['endereco']] ;

    $query = "INSERT INTO perfil_territorial VALUES(null,";
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