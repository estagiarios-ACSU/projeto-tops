<?php
include "User.class.php";

session_start();

if(isset($_POST['btn'])){
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $user = new User($email,$senha,'top');

    $user->connectDb('top');

    if($user->getLoginAutentication('usuario')){
        $_SESSION['admin'] = "pinho";
        header("location:../index.php");
    }else{
        session_destroy();
        echo"valval";
        echo "vc n esta logado";
    }
}
?>
