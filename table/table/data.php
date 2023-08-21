<?php

$db = new PDO("mysql:host=localhost;dbname=table","root","");

// Simulação de dados - substitua isso com acesso a um banco de dados real

$data = array(
    array("1", "João", "joao@example.com","blala","yts"),
    array("2", "Maria", "maria@example.com","blala","yts"),
    array("3", "Pedro", "pedro@example.com","blala","yts"),
    // Adicione mais dados aqui
);

foreach($db->query("SELECT * FROM perfil_territorial") as $key){
    extract($key);

    array_push($data,["$instituicao","$localidade","$natureza","$zona","$endereco"]);
}

// Filtro e pesquisa
$searchTerm = isset($_GET['search']) ? $_GET['search'] : "";
$filteredData = array_filter($data, function ($row) use ($searchTerm) {
    return stripos($row[0], $searchTerm) !== false || stripos($row[2], $searchTerm) !== false;
});

foreach ($filteredData as $row) {
    echo "<tr>";
    echo "<td>{$row[0]}</td>";
    echo "<td>{$row[1]}</td>";
    echo "<td>{$row[2]}</td>";
    echo "<td>{$row[3]}</td>";
    echo "<td>{$row[4]}</td>";
    echo "<td><a><img src='../assets/botao-editar.png' alt='Editar' width='20' heigth='20'></a><a><img src='../assets/lixeira.png' alt='Deletar' width='20' heigth='20'></a></td>";
    echo "</tr>";
}
?>