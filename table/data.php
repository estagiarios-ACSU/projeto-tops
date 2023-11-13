<?php

include "conn.php";

session_start();
$topID = $_SESSION["top"];
if(isset($_GET['tableReference'])){
    $cont = 1;
    if($_GET['tableReference'] == 1){
        $data = array();

        foreach($db->query("SELECT * FROM perfil_territorial where topID = $topID") as $key){
            extract($key);
    
            array_push($data,["$instituicao","$localidade","$natureza","$zona","$endereco","$id_perfil"]);
        }

        if(isset($_GET['indexSelectOption'])){
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
            $filteredData = array_filter($data, function ($row) use ($searchTerm) {
            return stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false || stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false;
        });
        }
    
        foreach ($filteredData as $row) {

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
    }elseif($_GET['tableReference'] == 0){
        $data = array();

        foreach($db->query("SELECT * FROM agenda_territorial where topID = $topID") as $key){
            extract($key);
    
            array_push($data,["$compromisso","$eixo","$responsavel","$observacao","$situacao","$id_agenda"]);
        }

        if(isset($_GET['indexSelectOption'])){
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
            $filteredData = array_filter($data, function ($row) use ($searchTerm) {
            return stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false || stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false;
        });
        }

        foreach ($filteredData as $row) {

            echo "<tr class='agenda-tr-perfil'>";
            echo "<td class='perfilDados agenda-line$cont agenda-contentLine$cont'>{$row[0]}</td>";
            echo "<td class='perfilDados agenda-line$cont agenda-contentLine$cont'>{$row[1]}</td>";
            echo "<td class='perfilDados agenda-line$cont agenda-contentLine$cont'>{$row[2]}</td>";
            echo "<td class='perfilDados agenda-line$cont agenda-contentLine$cont'>{$row[3]}</td>";
            echo "<td class='perfilDados agenda-line$cont agenda-contentLine$cont'>{$row[4]}</td>";
            echo "<td style='display:none' class='perfilDados agenda-line$cont agenda-instituicao agenda-contentLine$cont'>{$row[5]}</td>";
            echo "<td style='text-align:center'>
            <a><img class='agenda-contentLine$cont' src='../assets/icons/edit.ico'
             id='agenda-editBtn$cont' alt='Editar' width='20' heigth='20'></a>
             <a id='agenda-delBtn$cont'>
             <img src='../assets/icons/delete.ico' alt='Deletar' width='20' heigth='20'>
            </a></td>";
            echo "</tr>";
    
    
            $cont += 1;
    
        }

    }elseif($_GET['tableReference'] == 2){
        $data = array();

        foreach($db->query("SELECT * FROM usuario") as $key){
            extract($key);
    
            array_push($data,["$nomeUsuario","$email","$senha","$admin","Prefeite","$id"]);
        }

        if(isset($_GET['indexSelectOption'])){
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
            $filteredData = array_filter($data, function ($row) use ($searchTerm) {
            return stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false || stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false;
        });
        }

        foreach ($filteredData as $row){

            echo "<tr class='admin-tr-perfil'>";
            echo "<td class='perfilDados admin-line$cont admin-contentLine$cont'>{$row[0]}</td>";
            echo "<td class='perfilDados admin-line$cont admin-contentLine$cont'>{$row[1]}</td>";
            echo "<td class='perfilDados admin-line$cont admin-contentLine$cont'>{$row[2]}</td>";
            echo "<td class='perfilDados admin-line$cont admin-contentLine$cont'>{$row[3]}</td>";
            echo "<td class='perfilDados admin-line$cont admin-contentLine$cont'>{$row[4]}</td>";
            echo "<td style='display:none' class='perfilDados admin-line$cont admin-instituicao admin-contentLine$cont'>{$row[5]}</td>";
            echo "<td style='text-align:center'>
            <a><img class='admin-contentLine$cont' src='../assets/icons/edit.ico'
             id='admin-editBtn$cont' alt='Editar' width='20' heigth='20'></a>
             <a id='admin-delBtn$cont'>
             <img src='../assets/icons/delete.ico' alt='Deletar' width='20' heigth='20'>
            </a>
            </td>";
            echo "</tr>";
    
    
            $cont += 1;
    
        }

    }

}


?>