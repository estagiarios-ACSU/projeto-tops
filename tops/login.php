<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>

<body>
    <main class="">
            <div class="img-bg">
                <img src="../assets/foto_maranguape.jpg" alt="">
        </div>
        <div class="container-left">
            <div class="login-form">
                <h2>Login</h2>
                <form method="POST" action="../modal/autentication.php">
                    <div class="input-field">
                        <input type="email" name="email" id="username" placeholder="Digite seu E-mail" >
                        <div class="underline"></div>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" id="password" placeholder="Digite sua Senha">
                        <div class="underline"></div>
                    </div>

                    <input name="btn" type="submit" value="Entrar">
                </form>

                <div class="footer">
                    <span>Não tem uma conta?&nbsp;<a href="create.php">Criar conta</a>
                    <br>Voltar para pagina incial&nbsp;<a href="../index.php">Pagina incial</a></span>
                </div>
            </div>
        </div>
        <div class="container-right">
            
        </div>
    </main>
</body>

</html>
