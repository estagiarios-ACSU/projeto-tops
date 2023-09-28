<?php
include "User.class.php";

session_start();

if(isset($_POST['btn'])){
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $user = new User($email,$senha,'top');

    $user->connectDb('top');

    if($user->getLoginAutentication('usuario')){
        $_SESSION['admin'] = "admin";
        $_SESSION['email'] = $email;
        header("location:../index.php");
    }else{
        session_destroy(); 
        header("location:../index.php");
        echo"<script>Alert(2)</script>";
        echo "vc n esta logado";
    }
}
?>
