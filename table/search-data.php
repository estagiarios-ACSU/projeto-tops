<?php

include "conn.php";

// Simulação de dados - substitua isso com acesso a um banco de dados real

if($_GET['tableReference'] == 'perfil_territorial'){
    
$data = array();

foreach($db->query("SELECT * FROM perfil_territorial") as $key){
    extract($key);

    array_push($data,["$instituicao","$localidade","$natureza","$zona","$endereco","$id_perfil"]);
}

// Filtro e pesquisa
if(isset($_GET['indexSelectOption'])){
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
    $filteredData = array_filter($data, function ($row) use ($searchTerm) {
    return stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false || stripos($row[0], $searchTerm) !== false;
});
}else{
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
    $filteredData = array_filter($data, function ($row) use ($searchTerm) {
    return stripos($row[0], $searchTerm) !== false || stripos($row[2], $searchTerm) !== false;
});
}


$cont = 1;

foreach ($filteredData as $row) {
    /*for($i = 0;$i<count($row);$i++){
        $row[$i] = wordwrap( $row[$i], 10, "<BR>", 1);
    }*/
    echo "<tr class='perfil-tr-perfil'>";
    echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[0]}</td>";
    echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[1]}</td>";
    echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[2]}</td>";
    echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[3]}</td>";
    echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[4]}</td>";
    echo "<td style='display:none' class='perfilDados perfil-instituicao perfil-line$cont perfil-contentLine$cont'>{$row[5]}</td>";
    echo "<td style='text-align:center'>
    <a><img class='perfil-contentLine$cont' src='../assets/icons/edit.ico'
     id='perfil-editBtn$cont' alt='Editar' width='20' heigth='20'></a>
     <a id='perfil-delBtn$cont'>
     <img src='../assets/icons/delete.ico' alt='Deletar' width='20' heigth='20'>
    </a></td>";
    echo "</tr>";


    $cont += 1;

}
}elseif($_GET['tableReference'] == 'agenda_territorial'){
    $data = array();

    foreach($db->query("SELECT * FROM agenda_territorial") as $key){
        extract($key);

        array_push($data,["$compromisso","$eixo","$responsavel","$observacao","$situacao","$id_agenda"]);
    }

    if(isset($_GET['indexSelectOption'])){
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
        $filteredData = array_filter($data, function ($row) use ($searchTerm) {
        return stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false || stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false;
    });
    }

    $cont = 1;
    foreach ($filteredData as $row) {
        /*for($i = 0;$i<count($row);$i++){
            $row[$i] = wordwrap( $row[$i], 10, "<BR>", 1);
        }*/
        echo "<tr class='agenda-tr-perfil'>";
        echo "<td class='perfilDados agenda-line$cont agenda-contentLine$cont'>{$row[0]}</td>";
        echo "<td class='perfilDados agenda-line$cont agenda-contentLine$cont'>{$row[1]}</td>";
        echo "<td class='perfilDados agenda-line$cont agenda-contentLine$cont'>{$row[2]}</td>";
        echo "<td class='perfilDados agenda-line$cont agenda-contentLine$cont'>{$row[3]}</td>";
        echo "<td class='perfilDados agenda-line$cont agenda-contentLine$cont'>{$row[4]}</td>";
        echo "<td style='display:none' class='perfilDados agenda-instituicao agenda-line$cont agenda-contentLine$cont'>{$row[5]}</td>";
        echo "<td style='text-align:center'>
        <a><img class='agenda-contentLine$cont' src='../assets/icons/edit.ico'
         id='agenda-editBtn$cont' alt='Editar' width='20' heigth='20'></a>
         <a id='agenda-delBtn$cont'>
         <img src='../assets/icons/delete.ico' alt='Deletar' width='20' heigth='20'>
        </a></td>";
        echo "</tr>";


        $cont += 1;

    }
}

?>