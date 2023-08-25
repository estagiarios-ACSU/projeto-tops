<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verifica se o arquivo já existe
    if (file_exists($targetFile)) {
        echo "Desculpe, Esse Arquivo já Existe";
        $uploadOk = 0;
    }

    // Verifica o tamanho do arquivo (aqui definido como 2MB)
    if ($_FILES["file"]["size"] > 10000000) {
        echo "Desculpe, Seu Arquivo é Muito Grande";
        $uploadOk = 0;
    }

    // Permite apenas certos formatos de arquivo (você pode adicionar mais)
    $allowedFormats = array("jpg", "jpeg", "png", "pdf", "docs");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Desculpe, seu arquivo não está em uma formatação aceita(jpg, jpeg, png, pdf, docs)";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Seu Arquivo Não Foi Enviado";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "O Arquivo ". htmlspecialchars(basename($_FILES["file"]["name"])). " Foi Enviado Com Sucesso";
        } else {
            echo "Desculpe, Erro ao Fazer o Upload do Arquivo";
        }
    }
}
?>
