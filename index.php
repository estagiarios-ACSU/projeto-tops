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

if (isset($_SESSION["admin"])){
    if ($_SESSION["admin"] == "admin"){
        // echo"<script>console.log('logado')</script>";
        $_SESSION["admin"] = "logado";
    }
}else{
    $_SESSION["admin"] = "deslogado";
}

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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.2/CSSRulePlugin.min.js"></script>

        <script src="https://kit.fontawesome.com/2ec1b8316c.js" crossorigin="anonymous"></script>

        <!--=== CSS ===-->
        <link rel="stylesheet" href="css/style.css">

        <!-- Sweetalert -->
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

        <title>Document</title>

    </head>

    <body>
        <!--==== HEADER ====-->
        <header class="nav-bar">
            <div class="logo">
                <img src="./assets/logopmm.png" alt="logo-mpe">
            </div>

            <?php
                if ($_SESSION["adminMaster"] == "logado") {
                    echo "<div class='cad_admin'><a href='modal/cad_admin.php'><img src='./assets/icons/admin.png' alt='logo-mpe'></a></div>";
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
                                include "modal/Conn.php";
                            
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
                                    include "modal/Conn.php";
                                
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
                    <a href="index.php"><li>Home</li></a>
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
                                            window.location.href = 'modal/deslogar.php';
                                        }
                                    })
                        }
                        // console.log  (a)
                        </script>";
                            
                        } else{
                            echo"<a href='tops/login.php'><button class='bn632-hover bn18'>Login</button></a>";
                        }
                    ?>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="line"></div>

        <!--==== MAIN ====-->
        <main class="container">
            <div class="content-left">
                <h1 class="title">Territórios <br> Organizados <span id="territorio-span"></span></h1>
                <p id="texto_top_1">O projeto TOP (Territorios Organizados Produtivos) se trata de uma regionalização e divisão Municipal
                    para que ... Clique na TOP ao lado e você será direcionado para algumas informações sobre o local. </p>

                    <p id="texto_top_2">O projeto TOP (Territorios Organizados Produtivos) se trata de uma regionalização e divisão Municipal
                        para que ... Clique na TOP a baixo e você será direcionado para algumas informações sobre o local. </p>
            </div>

            <div class="map-img">
                <?xml version="1.0" encoding="utf-8"?>
    <svg viewBox="0 0 450 500" xmlns="http://www.w3.org/2000/svg" xmlns:bx="https://boxy-svg.com">
    <defs>
        <style bx:fonts="Poppins">@import url(https://fonts.googleapis.com/css2?family=Poppins%3Aital%2Cwght%400%2C100%3B0%2C200%3B0%2C300%3B0%2C400%3B0%2C500%3B0%2C600%3B0%2C700%3B0%2C800%3B0%2C900%3B1%2C100%3B1%2C200%3B1%2C300%3B1%2C400%3B1%2C500%3B1%2C600%3B1%2C700%3B1%2C800%3B1%2C900&amp;display=swap);</style>
    </defs>
    <g>
        <a style="" class="top" name="top-1" href="tops/top1.php">
        <path style=" stroke: rgb(255, 255, 255); stroke-linejoin: round; stroke-linecap: round;" d="M 388.105 66.528 L 377.203 61.386 L 365.478 43.078 L 377.409 34.644 L 384.403 26.416 L 391.808 29.09 L 394.688 33.204 L 405.591 36.084 L 410.733 40.404 L 407.648 46.163 L 404.151 50.278 L 399.831 56.655 L 388.105 66.528 Z">
            <title>1</title>
        </path>
        <text style="font-family: Poppins; font-size: 3.49616px; paint-order: fill; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; stroke-opacity: 0; stroke-width: 0px; white-space: pre;" transform="matrix(3.248629, 0, 0, 3.146309, -920.04425, -193.294067)" x="400.563" y="77.22">01</text>
        </a>
        <a style="" class="top" name="top-2" href="tops/top2.php">
        <path style=" stroke-linejoin: round; stroke-linecap: round; stroke: rgb(255, 255, 255); paint-order: fill;" d="M 409.969 101.08 L 392.992 62.995 L 399.874 56.342 L 411.116 40.282 L 420.752 43.494 L 423.735 46.706 L 434.976 45.1 L 443.236 48.771 L 445.071 51.983 L 449.66 52.901 L 450.807 57.948 L 442.777 62.766 L 440.712 67.125 L 435.206 68.043 L 428.782 74.696 L 427.405 79.284 L 423.046 82.955 L 423.735 86.855 L 422.358 98.327 L 419.146 100.621 L 409.969 101.08 Z">
            <title>2</title>
        </path>
        <text style="font-family: Poppins; font-size: 3.49616px; paint-order: fill; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; stroke-opacity: 0; stroke-width: 0px;" transform="matrix(2.777564, 0, 0, 3.146309, -703.53717, -172.89595)" x="400.563" y="77.22">02</text>
        </a>
        <a style="" class="top" name="top-3" href="tops/top3.php">
        <path style="stroke: rgb(255, 255, 255); stroke-linejoin: round; stroke-linecap: round;" d="M 404.922 89.609 L 398.039 85.249 L 391.615 85.02 L 381.979 79.514 C 381.979 79.514 377.85 79.514 377.62 79.514 C 377.39 79.514 373.261 72.172 373.261 72.172 L 364.084 67.584 L 352.613 60.472 L 348.254 54.507 L 356.513 46.477 L 359.496 46.706 L 365.461 43.265 L 371.655 54.277 L 376.932 61.848 L 387.944 66.666 L 392.992 63.225 L 404.922 89.609 Z">
            <title>3</title>
        </path>
        <text style="font-family: Poppins; font-size: 4.18424px; line-height: 6.69479px; stroke-width: 0px;" transform="matrix(2.309764, 0, 0, 2.62891, -450.362946, -93.419518)"><tspan x="349.631" y="58.407">03</tspan><tspan x="349.631" dy="1em">​</tspan></text>
        </a>
        <a style="" class="top" name="top-4" href="tops/top4.php">
        <path style=" stroke: rgb(255, 255, 255); stroke-linejoin: round; stroke-linecap: round;" d="M 348.254 54.277 L 345.042 56.571 L 343.895 65.29 L 340.912 68.731 L 340.912 73.319 L 348.713 79.973 C 348.713 79.973 349.401 88.461 349.172 88.461 C 348.943 88.461 356.054 93.05 356.054 93.05 L 360.872 94.426 L 364.084 99.015 C 364.084 99.015 365.002 106.357 364.772 106.127 C 364.542 105.897 369.132 108.651 368.902 108.421 C 368.672 108.191 371.655 114.616 370.967 113.928 C 370.279 113.24 375.785 117.14 375.785 117.14 C 375.785 117.14 399.645 110.486 399.645 110.716 C 399.645 110.946 400.792 107.504 400.792 107.504 C 400.792 107.504 409.74 100.85 409.51 100.85 C 409.28 100.85 405.151 90.067 404.692 89.838 C 404.233 89.609 398.039 86.167 398.039 86.167 L 391.845 85.479 L 381.75 80.202 L 377.391 79.514 L 373.491 72.631 L 363.625 67.584 L 352.384 60.701 L 348.254 54.277 Z"/>
        <text style="font-family: Poppins; font-size: 4.18424px; line-height: 6.69479px; stroke-width: 0px; white-space: pre;" transform="matrix(2.309764, 0, 0, 2.62891, -431.695984, -52.130337)"><tspan x="349.631" y="58.407">04</tspan><tspan x="349.6310119628906" dy="1em">​</tspan></text>
        </a>
        <a style="" class="top" name="top-5" href="tops/top5.php">
        <path style="stroke: rgb(255, 255, 255);" d="M 409.597 185.844 L 413.055 189.302 L 421.831 188.504 L 423.427 183.184 L 427.417 181.057 L 435.927 166.961 L 430.608 152.865 L 432.736 145.684 L 427.151 141.163 L 425.023 136.641 L 423.427 128.13 L 408.001 129.726 L 399.757 111.109 L 376.086 118.024 L 370.767 114.034 L 367.841 107.651 L 364.384 105.79 L 363.852 98.609 L 359.596 94.619 L 348.958 88.502 L 348.426 79.991 L 340.181 73.342 L 338.319 76.268 C 338.319 76.268 332.468 79.193 332.734 79.193 C 333 79.193 334.064 87.97 334.064 87.97 L 328.479 93.289 L 327.681 105.79 L 313.585 111.641 L 310.127 105.79 L 302.148 107.119 L 289.116 124.407 L 271.297 131.854 L 269.435 143.556 L 261.722 149.939 L 247.626 149.141 L 246.296 146.482 L 231.402 144.088 L 213.583 158.184 L 219.966 166.163 L 226.349 174.674 C 226.349 174.674 229.009 186.11 228.477 186.11 C 227.945 186.11 234.594 181.855 234.594 181.855 L 255.073 182.653 L 257.467 179.461 L 287.786 186.642 L 292.042 179.461 L 309.063 168.557 L 326.883 160.844 L 342.575 146.216 L 362.256 147.546 L 385.129 155.258 L 388.852 164.567 L 399.491 164.833 L 406.14 173.078 L 409.597 185.844 Z"/>
        <text style="font-family: Poppins; font-size: 4.18424px; line-height: 6.69479px; stroke-width: 0px; white-space: pre;" transform="matrix(2.309764, 0, 0, 2.62891, -512.095215, -16.76255)" y="58.40700149536133" x="349.6310119628906">Top 05</text>
        </a>
        <a style="" class="top" name="top-6" href="tops/top6.php">
        <path style="stroke: rgb(255, 255, 255); stroke-linejoin: round; stroke-linecap: round;" d="M 229.009 186.376 C 229.009 186.376 234.594 181.855 234.86 181.855 C 235.126 181.855 255.339 183.45 255.339 183.45 L 257.733 179.993 C 257.733 179.993 288.584 186.908 288.052 186.908 C 287.52 186.908 293.638 178.663 293.638 178.663 L 309.861 168.291 L 327.149 161.11 L 343.107 146.482 L 362.788 147.812 L 384.863 155.79 L 388.586 164.567 L 399.225 164.833 L 405.342 173.078 L 409.065 185.578 L 411.991 189.302 C 411.991 189.302 409.331 193.291 409.065 193.025 C 408.799 192.759 410.661 207.653 410.661 207.653 L 405.342 209.249 C 405.342 209.249 404.81 225.738 404.278 225.738 C 403.746 225.738 406.672 228.664 406.672 228.664 L 395.501 240.366 C 395.501 240.366 389.118 243.558 388.054 242.76 C 386.99 241.962 372.894 249.143 372.894 249.143 L 367.841 248.877 L 365.979 254.196 L 354.277 264.037 L 346.83 266.431 L 339.915 274.409 L 327.947 274.409 L 322.096 271.218 L 316.244 279.995 L 314.915 297.016 L 304.808 281.59 L 300.553 279.463 C 300.553 279.463 299.489 274.675 299.489 274.409 C 299.489 274.143 288.584 265.101 288.584 265.101 L 283.265 263.239 L 281.137 258.984 L 271.297 253.398 L 268.371 240.366 L 253.211 231.058 L 245.232 222.547 L 237.785 214.834 L 237.254 210.313 L 228.743 204.993 L 230.073 199.94 L 229.009 186.376 Z"/>
        <text style="font-family: Poppins; font-size: 4.18424px; line-height: 6.69479px; stroke-width: 0px; white-space: pre;" transform="matrix(2.309764, 0, 0, 2.62891, -499.328979, 57.440777)" y="58.40700149536133" x="349.6310119628906">Top 06</text>
        </a>
        <a style="" class="top" name="top-7" href="tops/top7.php">
        <path style=" stroke: rgb(255, 255, 255); stroke-linejoin: round; stroke-linecap: round;" d="M 210.77 157.716 L 213.374 158.005 L 226.791 175.419 L 229.69 199.203 L 228.418 204.585 L 236.742 210.66 L 237.899 215.639 L 253.009 232.069 L 267.764 241.038 L 270.658 254.057 L 280.353 259.008 L 282.306 263.473 L 288.864 266.542 L 298.77 274.914 L 293.797 288.248 L 287.129 298.249 L 284.129 304.083 L 276.628 304.917 L 271.127 302.416 L 257.292 296.749 L 248.791 288.248 L 245.79 285.247 L 229.621 280.747 L 216.62 269.412 L 210.785 274.246 L 211.952 277.08 L 213.786 275.746 C 216.61 276.876 219.132 288.586 217.453 287.914 L 212.119 282.08 L 209.119 284.081 L 208.619 278.246 L 206.618 280.413 L 202.951 277.746 L 201.117 266.578 L 189.283 264.245 L 178.614 262.578 L 174.614 266.078 L 162.279 254.077 L 161.279 249.076 L 155.611 247.576 L 155.445 243.409 L 149.262 239.139 L 139.21 227.488 L 136.012 227.26 L 137.611 222.919 L 135.555 221.32 L 130.529 223.148 L 126.92 204.597 C 126.92 204.597 123.259 206.94 123.113 206.94 C 122.967 206.94 121.356 204.158 121.356 204.158 L 122.088 192.442 L 125.017 184.828 L 126.474 171.726 L 126.728 143.549 L 135.085 145.618 L 148.112 149.723 L 157.569 150.079 L 159.711 152.399 L 165.778 151.864 L 170.061 159.18 C 170.061 159.18 175.236 162.035 175.236 161.857 C 175.236 161.679 176.485 165.961 176.485 165.961 C 176.485 165.961 181.838 168.103 182.017 167.746 C 182.196 167.389 190.404 175.954 190.404 175.954 L 193.259 172.921 L 195.579 172.385 L 199.504 168.46 L 210.77 157.716 Z"/>
        <text style="font-family: Poppins; font-size: 4.18424px; line-height: 6.69479px; stroke-width: 0px; white-space: pre;" transform="matrix(2.309764, 0, 0, 2.62891, -633.810364, 64.137909)" y="58.40700149536133" x="349.6310119628906">Top 07</text>
        </a>
        <a style="" class="top" name="top-8" href="tops/top8.php">
        <path style=" stroke: rgb(255, 255, 255); stroke-linejoin: round; stroke-linecap: round;" d="M 126.801 143.594 L 126.547 137.496 L 122.396 139.02 L 117.822 136.649 L 108.963 135.011 L 104.911 129.946 L 86.337 124.205 L 83.973 126.569 L 81.272 123.698 L 73.842 124.373 L 71.31 129.101 L 65.906 134.336 L 60.165 135.855 L 56.697 142.208 L 47.441 147.762 L 38.184 149.614 L 32.63 158.341 L 18.613 171.3 L 13.059 171.829 L 6.976 179.235 L 10.943 193.516 L 13.588 196.954 L 16.497 206.475 L 22.051 211.765 L 22.845 222.873 L 26.283 231.071 L 34.22 238.546 L 52.308 258.207 L 53.292 262.926 C 53.292 262.926 59.78 262.73 59.583 262.73 C 59.386 262.73 63.122 265.875 62.926 266.072 C 62.73 266.269 62.729 268.038 62.729 268.235 C 62.729 268.432 65.482 272.954 65.482 272.954 L 62.533 278.459 L 68.038 285.887 L 70.397 285.887 C 70.397 285.887 69.021 302.796 68.824 302.796 C 68.627 302.796 69.611 309.677 69.807 309.677 C 70.003 309.677 76.099 301.223 76.099 301.223 L 77.082 305.155 C 77.082 305.155 80.621 303.385 81.408 303.779 C 82.195 304.173 84.357 309.087 84.357 309.087 L 87.896 304.762 L 108.147 313.937 L 110.114 316.886 L 112.866 316.297 L 123.484 320.425 L 125.253 323.375 L 135.281 323.178 L 139.999 327.897 C 139.999 327.897 152.386 329.47 151.993 329.077 C 151.6 328.684 166.797 338.429 166.797 338.429 L 174.78 338.252 L 181.167 342.864 L 181.345 349.429 L 185.957 345.348 L 182.764 343.042 L 184.006 337.897 L 190.038 327.962 L 190.747 322.994 L 195.183 319.801 L 202.633 303.377 L 201.35 300.598 L 198.143 300.598 L 199.212 294.826 L 213.535 284.352 L 212.205 282.746 L 209.375 284.24 L 208.51 279.444 L 206.623 280.702 L 202.455 277.95 L 200.568 266.942 L 178.866 262.696 L 174.856 266.155 L 162.104 254.204 L 161.169 249.266 L 155.63 247.664 L 155.332 243.299 L 148.969 239.098 C 148.969 239.098 139.131 227.729 139.221 227.729 C 139.311 227.729 135.977 227.188 135.977 227.188 L 137.599 222.682 L 135.797 221.51 L 130.659 223.132 L 126.964 204.927 L 123.269 206.82 L 121.286 204.026 L 122.098 192.129 L 125.072 184.469 L 126.514 171.671 L 126.801 143.594 Z"/>
        <text style="font-family: Poppins; font-size: 4.18424px; line-height: 6.69479px; stroke-width: 0px; white-space: pre;" transform="matrix(2.309764, 0, 0, 2.62891, -747.53302, 62.294418)"><tspan x="349.631" y="58.407">Top 08</tspan><tspan x="349.6310119628906" dy="1em">​</tspan></text>
        </a>
    </g>
    </svg>
            </div>
        </main>

        <button class="top-btn" style="color: #2874fc; font-size: 20px;"><i class="fa-solid fa-circle-chevron-up"></i></button>

        <div class="lista-tops">
        <h1 id="text-test"></h1>
        </div>

        
        <section class="territorios">
        <div class="tops">
            <div class="top">
                <img src="assets/areaverde.png">
                <h1>Top 1</h1>
                <p>Area Verde, Outra Banda...</p>
                <a href="tops/top1.php"><button class="btn">Entrar</button></a>
            </div>
            <div class="top">
                <img src="assets/areaseca.png">
                <h1>Top 2</h1>
                <p>Area Seca, Proube...</p>
                <a href="tops/top2.php"><button class="btn">Entrar</button></a>
            </div>
            <div class="top">
                <img src="assets/centro.png">
                <h1>Top 3</h1>
                <p>Centro, Parque Santa Fé...</p>
                <a href="tops/top3.php"><button class="btn">Entrar</button></a>
            </div>
            <div class="top">
                <img src="assets/top4.png">
                <h1>Top 4</h1>
                <p>Santos Dumont, Parque Iracema...</p>
                <a href="tops/top4.php"><button class="btn">Entrar</button></a>
            </div>
            <div class="top">
                <img src="assets/tabatinga.jpg">
                <h1>Top 5</h1>
                <p>Sapupara, Ladeira Grande...</p>
                <a href="tops/top5.php"><button class="btn">Entrar</button></a>
            </div>
            <div class="top">
                <img src="assets/umarizeiras.png">
                <h1>Top 6</h1>
                <p>Umarizeiras, Jubaia...</p>
                <a href="tops/top6.php"><button class="btn">Entrar</button></a>
            </div>
            <div class="top">
                <img src="assets/ama.png">
                <h1>Top 7</h1>
                <p>Amanari, Tanques...</p>
                <a href="tops/top7.php"><button class="btn">Entrar</button></a>
            </div>
             <div class="top">
                <img src="assets/itapebussu.jpg">
                <h1>Top 8</h1>
                <p>Itapebussu, Lagoa do Juvenal...</p>
                <a href="tops/top8.php"><button class="btn">Entrar</button></a> 
            </div>
        </div>
    </section>


        <footer>
            <div class="container-msg">
                <div class="img-left">
                    <img src="./assets/msg.svg" alt="" srcset="">
                </div>
                <div class="form-msg">
                <h1>Fale Conosco</h1>
                <form action="modal/msg.php" method="POST" class="formulario">
                    <input type="hidden" name="_autoresponse" value="VEM PRA CÁ BAITOLA">
                    <input type="hidden" name="_next" value="http://localhost/ouvidoria_maranguap-main/"><!--SERVE PRA REDIRECIONAR O USUÁRIO PARA OUTRA PÁGINA-->
                    <input type="hidden" name="_template" value="table">
                    <div class="box">
                        <input type="text" name="nome" minlength="3" maxlength="100" placeholder="Nome *">
                    </div>
                    <div class="box">
                        <input type="email" name="email" minlength="10" maxlength="100" placeholder="E-mail *">
                    </div>

                    <textarea class="form-control" id="" cols="30" rows="10" name="descricao" placeholder="Texto aqui!!! *"></textarea>
                    <?php

                    
                    if(isset($_SESSION['error'])){
                        echo '<p style="color:red; font-size:14px;">Erro ao enviar mensagem</p>';
                        unset($_SESSION['error']);
                    }
                    
                 ?>
                    <button type="submit" name="btn" class="bn632-hover bn18 btn-footer">Enviar</button>
                </form>
                </div>
            </div>

            <div class="content-footer">
                <div class="content-footer-left">
                    <img src="./assets/logopmm.png">
                </div>
                <div class="content-footer-right">
                    <a name="contato"></a>
                    <h1>ACOMPANHE</h1>
                    <div class="social-media">
                        <a target="_blank" href="https://www.instagram.com/prefeituramaranguape/"><img src="./assets/icons/icons8-instagram.svg" alt=""></a>
                        <a target="_blank" href="https://www.facebook.com/prefeituramaranguapeoficial/?locale=pt_BR"><img src="./assets/icons/icons8-facebook-novo.svg" alt="" srcset=""></a>
                        <a target="_blank" href="https://www.youtube.com/c/PrefeituradeMaranguape"><img src="./assets/icons/icons8-reproduzir-youtube.svg" alt="" srcset=""></a>
                    </div>
                </div>
            </div>

            <div class="copy">Copyright &copy 2023
                Prefeitura Municipal
                de Maranguape.</div>
        </footer>


        <!--==== JS ====-->
        <script src="main.js"></script>
    </body>

</html>
