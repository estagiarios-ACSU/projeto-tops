<?php

include "conn.php";

// Simulação de dados - substitua isso com acesso a um banco de dados real

$data = array();

foreach($db->query("SELECT * FROM perfil_territorial") as $key){
    extract($key);

    array_push($data,["$instituicao","$localidade","$natureza","$zona","$endereco"]);
}

// Filtro e pesquisa
$searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
$filteredData = array_filter($data, function ($row) use ($searchTerm) {
    return stripos($row[0], $searchTerm) !== false || stripos($row[2], $searchTerm) !== false;
});

$cont = 1;

foreach ($filteredData as $row) {
    echo "<tr class='tr-perfil'>";
    echo "<td class='instituicao-nome'>{$row[0]}</td>";
    echo "<td>{$row[1]}</td>";
    echo "<td>{$row[2]}</td>";
    echo "<td>{$row[3]}</td>";
    echo "<td>{$row[4]}</td>";
    echo "<td style='text-align:center'><a><img src='../assets/icons/edit.ico' alt='Editar' width='20' heigth='20'></a><a id='delBtn$cont'><img src='../assets/icons/delete.ico' alt='Deletar' width='20' heigth='20'></a></td>";
    echo "</tr>";


    $cont += 1;

}
?>