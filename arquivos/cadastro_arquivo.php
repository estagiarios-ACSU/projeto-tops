<?php

session_start();
include_once './conexao.php';

$dados_submit = filter_input(INPUT_POST, 'btn', FILTER_SANITIZE_STRING);
if ($dados_submit) {

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $nome_arquivo = $_FILES['imagem']['name'];

    $query = "INSERT INTO arquivos (nome, imagem) VALUES (:nome, :imagem)";
    $insert_msg = $conn->prepare($query);
    $insert_msg->bindParam(':nome', $nome);
    $insert_msg->bindParam(':imagem', $nome_arquivo);


    if ($insert_msg->execute()) {

        $ultimo_id = $conn->lastInsertId();


        $diretorio = 'imagens/' . $ultimo_id.'/';

 
        mkdir($diretorio, 0755);
        
        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nome_arquivo)){
            header("Location: ../tops/top1 copy.php");
        }else{
           
            header("Location: index.php");
        }        
    } else {

        header("Location: index.php");
    }
} else {
   
    header("Location: index.php");
}