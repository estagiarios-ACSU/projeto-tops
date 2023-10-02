<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Input com Ícone de Lupa</title>

</head>
<body>
    <script>
        async function getData(){
            let request = await fetch(`data.php?tableReference=2`);
            let response = await request.text();
            console.log(response);
        }

        getData()
    </script>
</body>
</html>