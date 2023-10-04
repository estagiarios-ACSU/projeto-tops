<?php
include "User.class.php";

session_start();

if(isset($_POST['btn'])){
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $user = new User($email,$senha,'top');
    
    $adminM = $user->adminMaster('usuario');
    $admin = $user->getLoginAutentication('usuario');

    if($adminM){
        $_SESSION['adminMaster'] = "Master";
        $_SESSION['email'] = $email;
        header("location:../index.php");
    } else if($admin){
        $_SESSION['admin'] = "admin";
        $_SESSION['email'] = $email;
        header("location:../index.php");
    }
    else{
        session_destroy(); 
        // header("location:../index.php");
        echo"<script>Alert(2)</script>";
        echo "vc n esta logado";
    }
}
?>
