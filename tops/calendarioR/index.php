<?php
session_start();

if (isset($_SESSION["adminMaster"])){
    if ($_SESSION["adminMaster"] == "Master"){
        $_SESSION["adminMaster"] = "logado";
    }
} else{
    // echo"<script>console.log('nao logado')</script>";
    $_SESSION["adminMaster"] = "deslogado";
}   

if (isset($_SESSION["admin"])) {
    if ($_SESSION["admin"] == "logado"){
        $_SESSION["admin"] = "logado";
        echo"<script>console.log('logado')</script>";
    }
}else {
    $_SESSION["admin"] = "deslogado";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- CALENDARIO -->

    <!-- Fullcalendar -->
    <script type="text/javascript" src="calendario_js/index.global.min.js"></script>
    <script  type="text/javascript" src="calendario_js/pt-br.global.js"></script>
    <script  type="text/javascript" src="calendario_js/pt-br.global.min.js"></script>
    
    <!-- JQUUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="calendario_css/personalizado.css">
    <link rel="stylesheet" href="calendario_css/width.css">
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <!--==== HEADER ====-->
    <header class="nav-bar">
        <div class="logo">
            <img src="../../assets/logopmm.png" alt="logo-mpe">
        </div>

        
        <?php
            if ($_SESSION["adminMaster"] == "logado") {
                echo "<div class='cad_admin'><a href='../../modal/cad_admin.php'><img src='../../assets/icons/admin.png' alt='logo-mpe'></a></div>";
                echo "<script>document.getElementsByClassName('logo')[0].style.marginLeft = '20px'; </script>";
            }
        ?>

        <div class="hamburger-menu">
            <input type="checkbox" name="" id="menu__toogle">
            <label for="menu__toogle" class="menu__btn">
                <span></span>
            </label>

            <ul class="menu__box">
                <li class="icons"><img src="./assets/icons/house.svg" class="icon__menu" alt=""><a href="index.php"
                        class="menu__item">Home</a></li>
                <li class="icons"><img src="./assets/icons/info-circle.svg" class="icon__menu" alt=""><a href="menu/sobre.php"
                        class="menu__item">Sobre</a></li>
                <li class="icons"><img src="./assets/icons/calendar-date.svg" class="icon__menu" alt=""><a href="menu/agenda.php"
                        class="menu__item">Agenda</a></li>
                <li class="icons"><img src="./assets/icons/telephone.svg" class="icon__menu" alt=""><a href="#contato"
                        class="menu__item">Contato</a></li>
            </ul>
        </div>

        <nav class="menu">
            <ul>
                <?php
                    if ($_SESSION["admin"] == "logado") {
                            if (isset($_SESSION["email"])){
                            include "../../modal/Conn.php";
                        
                            $conn = new Conn("top");
                            $conexao = $conn->connectDb("top");

                            $session_email = $_SESSION['email'];
                            $query = "SELECT email FROM usuario WHERE email = '$session_email'";
                            $result = $conexao->query($query);
                            $result->execute();

                        
                            $array = $result->fetchall(PDO::FETCH_ASSOC);
                            foreach($array as $row){
                                extract($row);
                                $email_user = $email;
                                // echo "<script>alert('$email_user')</script>";
                            }

                            echo "<li class='user_logado'>User logado: $email_user</li>";
                        }
                    } else if ($_SESSION["adminMaster"] == "logado"){
                        if (isset($_SESSION["email"])){
                                include "../../modal/Conn.php";
                            
                                $conn = new Conn("top");
                                $conexao = $conn->connectDb("top");

                                $session_email = $_SESSION['email'];
                                $query = "SELECT email FROM usuario WHERE email = '$session_email'";
                                $result = $conexao->query($query);
                                $result->execute();

                            
                                $array = $result->fetchall(PDO::FETCH_ASSOC);
                                foreach($array as $row){
                                    extract($row);
                                    $email_user = $email;
                                    // echo "<script>alert('$email_user')</script>";
                                }

                                echo "<li class='user_logado'>User logado: $email_user</li>";
                            }
                        }
                ?>
                <a href="../../index.php"><li>Home</li></a>
                <a href="menu/sobre.php"><li>Sobre</li></a>
                <a href="menu/agenda.php"><li>Agenda</li></a>
                <li class="login">
                <?php
                if ($_SESSION["admin"] == "logado" || $_SESSION['adminMaster'] == "logado") { 
                    echo"
                    <button id='btn_deslogar' name='btn_deslogar' class='bn632-hover bn18'>Deslogar</button>       
                    <script>
                    let button = document.getElementById('btn_deslogar')
                    
                    button.onclick = function() {
                        Swal.fire({
                                title: 'Você tem certeza que quer sair da sua conta?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Sair',
                                cancelButtonText: 'Cancelar',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '../../modal/deslogar.php';
                                    }
                                })
                    }
                    // console.log  (a)
                    </script>";
                        
                    } else{
                        echo"<a href='../login.php'><button class='bn632-hover bn18'>Login</button></a>";
                    }
                ?>
                </li>
            </ul>
        </nav>
    </header>

    <div class="line"></div>

     <!-- Aqui começa o calendario -->
     <?php 
     $currentData = date('Y-m-d');
    
     if(isset($_SESSION['top'])){
          $top = $_SESSION['top'];
     }
     ?>
    
     <div id="conteudo">
     <!-- Calendar Container -->
          <div id='calendar-container'>
               <div id='calendar'></div>
          </div> 
     </div>


    <footer>
        <div class="content-footer">
            <div class="content-footer-left">
                <img src="../../assets/logopmm.png">
            </div>
            <div class="content-footer-right">
                <a name="contato"></a>
                <h1>ACOMPANHE</h1>
                <div class="social-media">
                    <a target="_blank" href="https://www.instagram.com/prefeituramaranguape/"><img src="../../assets/icons/icons8-instagram.svg" alt=""></a>
                    <a target="_blank" href="https://www.facebook.com/prefeituramaranguapeoficial/?locale=pt_BR"><img src="../../assets/icons/icons8-facebook-novo.svg" alt="" srcset=""></a>
                    <a target="_blank" href="https://www.youtube.com/c/PrefeituradeMaranguape"><img src="../../assets/icons/icons8-reproduzir-youtube.svg" alt="" srcset=""></a>
                </div>
            </div>
        </div>

        <div class="copy">Copyright &copy 2023
            Prefeitura Municipal
            de Maranguape.</div>
    </footer>

<?php 
if ($_SESSION["admin"] == "logado" || $_SESSION["adminMaster"] == "logado"){
    include("calendario_admin.php");
}else {
    include("calendario_user.php");
} ?>
</body>
</html>
