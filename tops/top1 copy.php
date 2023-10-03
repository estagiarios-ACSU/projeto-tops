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
    <link rel="stylesheet" href="../css/modal-style.css">
    <title>Document</title>

    <!--====MAP====-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
    integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
     integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
     crossorigin=""></script>

     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!--==== HEADER ====-->
    <header class="nav-bar">
        <div class="logo">
            <img src="../assets/logopmm.png" alt="logo-mpe">
        </div>


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
                <li class="icons"><img src="./assets/icons/calendar-date.svg" class="icon__menu" alt=""><a href="../menu/sobre.php"
                        class="menu__item">Agenda</a></li>
                <li class="icons"><img src="./assets/icons/telephone.svg" class="icon__menu" alt=""><a href="#contato"
                        class="menu__item">Contato</a></li>
            </ul>
        </div>

        <nav class="menu">
            <ul>
                <a href="../index.php"><li>Home</li></a>
                <a href="../menu/sobre.php"><li>Sobre</li></a>
                <a href="../menu/agenda.php"><li>Agenda</li></a>
                <a href="#contato"><li>Contato</li></a>
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
                        <a>Calendário TOP-1</a></li>
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
                          <p>Área Verde, Outra Banda, Parque das Rosas, São Benedito, Pau Serrado</p>
                      </div>
                      <div class="btn-exit">
                        <a href="../index.php"><button class="bn632-hover bn18">Voltar</button></a>
                      </div>
                    </div>
                    <div class="content-half">
                        <div class="cont-half">
                            <span class="top-topic">Unidade Territorial</span>
                            <span class="top-subtopic">Top-1</span>
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
                    <div class="content-top" style='display:block'>
                        <div>
                            <h1 title="Territorios Produtivos">Agenda Territorial</h1>
                            <p>Área Verde, Outra Banda, Parque das Rosas, São Benedito, Pau Serrado</p>
                        </div>
                        <div class="btn-exit">
                            <a href="../index.php"><button class="bn632-hover bn18">Voltar</button></a>
                        </div>
                    </div>
                    <div>
                        <?php
                            include "../table/index-agenda.php";
                        ?>
                    </div>
                </section>
                <!--====Perfil do Território====-->
                <section class="perfil">
                    <div class="content-top">
                        <div>
                            <h1 title="Territorios Produtivos">PERFIL DO TERRITÓRIO</h1>
                            <p>Área Verde, Outra Banda, Parque das Rosas, São Benedito, Pau Serrado</p>
                        </div>
                        <div class="btn-exit">
                          <a href="../index.php"><button class="bn632-hover bn18">Voltar</button></a>
                        </div>
                    </div>

                    <div class="content-equipments">
                        <div>
                            <?php
                            include "../table/index-territorial.php";
                            ?>

                            <script src="script.js"></script>
                            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
                        </div>
                    </div>
                </section>

                <!--Grupos Colegiados-->
                <section class="colegiados">
                    <div class="content-top">
                        <div>
                            <h1 title="Territorios Produtivos">Grupos Colegiados</h1>
                            <p>Área Verde, Outra Banda, Parque das Rosas, São Benedito, Pau Serrado</p>
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
                            <h1 title="Territorios Produtivos">Calendário Top-1</h1>
                            <p>Área Verde, Outra Banda, Parque das Rosas, São Benedito, Pau Serrado</p>
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
                            <p>Área Verde, Outra Banda, Parque das Rosas, São Benedito, Pau Serrado</p>
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
                            <p>Área Verde, Outra Banda, Parque das Rosas, São Benedito, Pau Serrado</p>
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

        <div class="copy">Copyright &copy 2022
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
        var map = L.map('map').setView([-3.8878235, -38.6808622], 14.3);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', { foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' }).addTo(map);

        var marker = L.marker([-3.872452, -38.670670]).addTo(map)
        marker.bindPopup("<b>Top-1</b><br>Área Verde").openPopup();
        ;

        var marker = L.marker([-3.880709, -38.677712]).addTo(map)
        marker.bindPopup("<b>Top-1</b><br>Outra Banda").openPopup();
        ;

        var marker = L.marker([-3.867488, -38.653801]).addTo(map)
        marker.bindPopup("<b>Top-1</b><br>Pau Serrado").openPopup();
        ;
    </script>

</body>

</html>
