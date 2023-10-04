<?php
session_start();

$_SESSION["top"] = 5;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <!--====SCROLL===-->

    <script src="https://unpkg.com/scrollreveal"></script>

    <!--=== CSS ===-->
    <link rel="stylesheet" href="../css/tops.css">
    <title>Document</title>

    <!--====MAP====-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
    integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
     integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
     crossorigin=""></script>

    <!-- Sweetalert -->
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

</head>

<body>
    <!--==== HEADER ====-->
    <header class="nav-bar">
        <div class="logo">
            <img src="../assets/logopmm.png" alt="logo-mpe">
        </div>

        <?php
            if ($_SESSION["adminMaster"] == "logado") {
                echo "<div class='cad_admin'><a href='../modal/cad_admin.php'><img src='../assets/icons/admin.png' alt='logo-mpe'></a></div>";
                echo "<script>document.getElementsByClassName('logo')[0].style.marginLeft = '20px'; </script>";
            }
        ?>


        <div class="hamburger-menu">
            <input type="checkbox" name="" id="menu__toogle">
            <label for="menu__toogle" class="menu__btn">
                <span></span>
            </label>

            <ul class="menu__box">
                <li class="icons"><img src="./assets/icons/house.svg" class="icon__menu" alt=""><a href="../index.php"
                        class="menu__item">Home</a></li>
                <li class="icons"><img src="./assets/icons/info-circle.svg" class="icon__menu" alt=""><a href="../menu/sobre.php"
                        class="menu__item">Sobre</a></li>
                <li class="icons"><img src="./assets/icons/calendar-date.svg" class="icon__menu" alt=""><a href="../menu/agenda.php"
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
                            include "../modal/Conn.php";
                        
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
                                include "../modal/Conn.php";
                            
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
                <a href="../index.php"><li>Home</li></a>
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
                                        window.location.href = '../modal/deslogar.php';
                                    }
                                })
                    }
                    // console.log  (a)
                    </script>";
                        
                    } else{
                        echo"<a href='login.php'><button class='bn632-hover bn18'>Login</button></a>";
                    }
                ?>
                </li>
            </ul>
        </nav>
    </header>

    <!--====MAIN====-->
    <main class="container">
        <div class="row">
            <div class="side-menu">
                <ul class="navbar-nav">
                    <li class="menu-items nav-item active" onclick="geral()">
                        <a>Geral</a>
                    </li>
                    <li class="menu-items" onclick="agenda()">
                        <a>Agenda Territorial</a>
                    </li>
                    <li class="menu-items" onclick="perfil()">
                        <a>Perfil do Território</a></li>
                    <li class="menu-items" onclick="colegiados()">
                        <a>Grupos Colegiados</a></li>
                    <li class="menu-items" onclick="calendario()">
                        <a href="calendarioR/index.php">Calendário TOP-5</a></li>
                    <li class="menu-items" onclick="download()">
                        <a>Arquivos Para Download</a></li>
                    <li class="menu-items" onclick="media()">
                        <a>Media</a></li>
                </ul>
            </div>
            <div class="content-right">
                <!--====GERAL====-->
                <section class="geral">
                    <div class="content-top">
                      <div>
                          <h1 title="Territorios Produtivos">Geral</h1>
                          <p>Sapupara, Ladeira Grande, Urucará, Trapiá, Gereraú, Penedo, Tabatinga</p>
                      </div>
                      <div class="btn-exit">
                        <a href="../index.php"><button class="bn632-hover bn18">Voltar</button></a>
                      </div>
                    </div>
                    <div class="content-half">
                        <div class="cont-half">
                            <span class="top-topic">Unidade Territorial</span>
                            <span class="top-subtopic">Top-5</span>
                        </div>
                        <div class="cont-half">
                            <span class="top-topic">Responsavel</span>
                            <span class="top-subtopic">Articulação</span>
                        </div>
                        <div class="cont-half">
                            <span class="top-topic">Contato</span>
                            <span class="top-subtopic">(85) 9XXXX-XXXX</span>
                        </div>
                    </div>
                    <div class="text-cont-top">
                        <p></p>
                    </div>
                    <div id="map"></div>
                </section>
                <!--====Agenda Territorial====-->
                <section class="agenda">
                    <div class="content-top">
                        <div>
                            <h1 title="Territorios Produtivos">Agenda Territorial</h1>
                            <p>Sapupara, Ladeira Grande, Urucará, Trapiá, Gereraú, Penedo, Tabatinga</p>
                        </div>
                        <div class="btn-exit">
                          <a href="../index.php"><button class="bn632-hover bn18">Voltar</button></a>
                        </div>
                      </div>
                </section>
                <!--====Perfil do Território====-->
                <section class="perfil">
                    <div class="content-top">
                        <div>
                            <h1 title="Territorios Produtivos">PERFIL DO TERRITÓRIO</h1>
                            <p></p>
                        </div>
                        <div class="btn-exit">
                          <a href="../index.php"><button class="bn632-hover bn18">Voltar</button></a>
                        </div>
                    </div>

                    <div class="content-equipments">
                        <div>
                            <p>1. Equipamentos Publicos Educação</p>
                            <table>
                                <thead>
                                    <tr>
                                        <th >Escolas</th>
                                        <th>Localidade</th>
                                        <th>Natureza</th>
                                        <th>Zona</th>
                                        <th>Endereço</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="30%">Sen Carlos Jereissati Caic</td>
                                        <td>Area Verde</td>
                                        <td>Pública</td>
                                        <td>Urbano</td>
                                        <td width="20%">Rua Antonio Teixeira, SN</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Chico Lima Emeief</td>
                                        <td>Area Verde</td>
                                        <td>Pública</td>
                                        <td>Urbano</td>
                                        <td width="20%">Av Senador Almir Pinto, 4005</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Wilson Bastos Rodrigues Cei</td>
                                        <td>Area Verde</td>
                                        <td>Pública</td>
                                        <td>Urbano</td>
                                        <td width="20%"><p>Rua Raimundo Pinto, 799</p></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Colegio Espaco Livre</td>
                                        <td>Area Verde</td>
                                        <td>Pública</td>
                                        <td>Urbano</td>
                                        <td width="20%">Rua Macario Pontes, 120</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Escolinha Primeiros Passos</td>
                                        <td>Area Verde</td>
                                        <td>Pública</td>
                                        <td>Urbano</td>
                                        <td width="20%">Irma Irene, 60</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Colegio Olimpico</td>
                                        <td>Area Verde</td>
                                        <td>Pública</td>
                                        <td>Urbano</td>
                                        <td width="20%">Rua Joaninha Vieira, 176</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Paulo Sarasate Emeief</td>
                                        <td>Outra Banda</td>
                                        <td>Pública</td>
                                        <td>Urbano</td>
                                        <td width="20%">Av Dr Argeu G Braga Herbster, 883</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Jose Mario Mota Barbosa Cei Dep</td>
                                        <td>Outra Banda</td>
                                        <td>Pública</td>
                                        <td>Urbano</td>
                                        <td width="20%">Rua Da Praça, Sn</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Renato Mota Emeief</td>
                                        <td>Outra banda</td>
                                        <td>Pública</td>
                                        <td>Urbano</td>
                                        <td width="20%">Rua Emanuel Abreu Costa, 103</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!--Grupos Colegiados-->
                <section class="colegiados">
                    <div class="content-top">
                        <div>
                            <h1 title="Territorios Produtivos">Grupos Colegiados</h1>
                            <p>Sapupara, Ladeira Grande, Urucará, Trapiá, Gereraú, Penedo, Tabatinga</p>
                        </div>
                        <div class="btn-exit">
                          <a href="../index.php"><button class="bn632-hover bn18">Voltar</button></a>
                        </div>
                      </div>
                </section>

                <!--Calendario do Top-->
                <section class="calendario">
                    <div class="content-top">
                        <div>
                            <h1 title="Territorios Produtivos">Calendário Top-5</h1>
                            <p>Sapupara, Ladeira Grande, Urucará, Trapiá, Gereraú, Penedo, Tabatinga</p>
                        </div>
                        <div class="btn-exit">
                          <a href="../index.php"><button class="bn632-hover bn18">Voltar</button></a>
                        </div>
                      </div>
                </section>

                <!--Download-->
                <section class="download">
                    <div class="content-top">
                        <div>
                            <h1 title="Territorios Produtivos">Arquivos Para Download
                            </h1>
                            <p></p>
                        </div>
                        <div class="btn-exit">
                          <a href="../index.php"><button class="bn632-hover bn18">Voltar</button></a>
                        </div>
                      </div>
                </section>

                <!--Media-->
                <section class="media">
                    <div class="content-top">
                        <div>
                            <h1 title="Territorios Produtivos">Media
                            </h1>
                            <p>Sapupara, Ladeira Grande, Urucará, Trapiá, Gereraú, Penedo, Tabatinga</p>
                        </div>
                        <div class="btn-exit">
                          <a href="../index.php"><button class="bn632-hover bn18">Voltar</button></a>
                        </div>
                      </div>
                </section>
                
            </div>
        </div>
    </main>


    <!--====FOOTER====-->
    <footer>

        <div class="content-footer">
            <div class="content-footer-left">
                <img src="../assets/logopmm.png">
                <p></p>
            </div>
            <div class="content-footer-right">
                <a name="contato"></a>
                <h1>ACOMPANHE</h1>
                <div class="social-media">
                    <a href="https://www.instagram.com/prefeituramaranguape/"><img src="../assets/icons/icons8-instagram.svg" alt=""></a>
                    <a href="https://www.facebook.com/prefeituramaranguapeoficial/?locale=pt_BR"><img src="../assets/icons/icons8-facebook-novo.svg" alt="" srcset=""></a>
                    <a href="https://www.youtube.com/c/PrefeituradeMaranguape"><img src="../assets/icons/icons8-reproduzir-youtube.svg" alt="" srcset=""></a>
                </div>
            </div>
        </div>

        <div class="copy">Copyright &copy 2023
            Prefeitura Municipal
            de Maranguape.</div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script>
        $(document).ready(function(){
            $('li').on('click', function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            })
        })
    </script>

    <script src="../tops/top.js"></script>
    <script>
        var map = L.map('map').setView([-3.943671545363894, -38.718326515358896], 12.3);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', { foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' }).addTo(map);
        var marker = L.marker([-3.9536677192233523, -38.693177556034776]).addTo(map)
        marker.bindPopup("<b>Top-5</b><br>Sapupara").openPopup();
        ;
        var marker = L.marker([-3.974666923797303, -38.707383579373264]).addTo(map)
        marker.bindPopup("<b>Top-5</b><br>Ladeira Grande").openPopup();
        ;
        var marker = L.marker([-3.9246215736614807, -38.69150610445158]).addTo(map)
        marker.bindPopup("<b>Top-5</b><br>Urucará").openPopup();
        ;
        var marker = L.marker([-3.9688941172030687, -38.76488339953204]).addTo(map)
        marker.bindPopup("<b>Top-5</b><br>Trapiá").openPopup();
        ;
        var marker = L.marker([-3.9355122233216457, -38.69452944005308]).addTo(map)
        marker.bindPopup("<b>Top-5</b><br>Gereraú").openPopup();
        ;var marker = L.marker([-3.9877831654261002, -38.80214344438052]).addTo(map)
        marker.bindPopup("<b>Top-5</b><br>Penedo").openPopup();
        ;var marker = L.marker([-3.9423591576966173, -38.69586983831059]).addTo(map)
        marker.bindPopup("<b>Top-5</b><br>Tabatinga").openPopup();
        ;
        ;
    </script>
</body>

</html>
