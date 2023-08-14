<?php
include "User.class.php";

session_start();

if(isset($_POST['btn'])){
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $user = new User($email,$senha);

    $user->connectDatabase('top','root','');

    if($user->getLoginAutentication('usuario')){
        $_SESSION['admin'] = "pinho";
        header("location:../index.html");
    }else{
        session_destroy();
        echo "vc n esta logado";
    }
}


?>