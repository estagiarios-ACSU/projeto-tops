<?php

include "conn.php";

session_start();
$topID = $_SESSION["top"];
$data = array();


if(isset($_GET['tableReference'])){
    if($_GET['tableReference'] == 1){
        foreach($db->query("SELECT * FROM perfil_territorial where topID = $topID") as $key){
            extract($key);
            
            array_push($data,["$instituicao","$localidade","$natureza","$zona","$endereco"]);
        }
        
        if(isset($_GET['indexSelectOption'])){
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
            $filteredData = array_filter($data, function ($row) use ($searchTerm) {
            return stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false || stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false;
            });
        }else{
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
            $filteredData = array_filter($data, function ($row) use ($searchTerm) {
            return stripos($row[0], $searchTerm) !== false || stripos($row[0], $searchTerm) !== false;
            });
        }
        
        $cont = 1;
            
        foreach ($filteredData as $row) {
        
            echo "<tr class='perfil-tr-perfil'>";
            echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[0]}</td>";
            echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[1]}</td>";
            echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[2]}</td>";
            echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[3]}</td>";
            echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[4]}</td>";
            echo "</tr>";
        
            $cont += 1;
            
        }
    }else{
        foreach($db->query("SELECT * FROM agenda_territorial where topID = $topID") as $key){
            extract($key);
    
            array_push($data,["$compromisso","$eixo","$responsavel","$observacao","$situacao"]);
        }
        
        if(isset($_GET['indexSelectOption'])){
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
            $filteredData = array_filter($data, function ($row) use ($searchTerm) {
            return stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false || stripos($row[$_GET['indexSelectOption']], $searchTerm) !== false;
            });
        }else{
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
            $filteredData = array_filter($data, function ($row) use ($searchTerm) {
            return stripos($row[0], $searchTerm) !== false || stripos($row[0], $searchTerm) !== false;
            });
        }
        
        $cont = 1;
            
        foreach ($filteredData as $row) {
        
            echo "<tr class='perfil-tr-perfil'>";
            echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[0]}</td>";
            echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[1]}</td>";
            echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[2]}</td>";
            echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[3]}</td>";
            echo "<td class='perfilDados perfil-line$cont perfil-contentLine$cont'>{$row[4]}</td>";
            echo "</tr>";
        
            $cont += 1;
            
        }
    }
}



?>