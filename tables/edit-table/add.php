<?php
require_once('Conn.php');

$fname= $_POST['fname'];
$mname= $_POST['mname'];
$lname= $_POST['lname'];
$address= $_POST['address'];
$email= $_POST['email'];

$conn = new Conn();
$conectar = $conn->connectDb();
$conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$insert = "INSERT INTO student (fname, mname, lname, address, email)
VALUES ('$fname', '$mname', '$lname', '$address', '$email')";
$conectar->prepare($insert);

$conectar->exec($insert);
echo "<script>alert('Account successfully added!'); window.location='index.php'</script>";
?>