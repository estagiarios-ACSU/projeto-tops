<?php
include 'Conn.php';

$get_id=$_REQUEST['student_id'];

$fname= $_POST['fname'];
$mname= $_POST['mname'];
$lname= $_POST['lname'];
$address= $_POST['address'];
$email= $_POST['email'];

$conn = new Conn();
$conectar = $conn->connectDb();
$update = "UPDATE student SET fname ='$fname', mname ='$mname', lname ='$lname', 
address ='$address', email ='$email' WHERE student_id = '$get_id' ";
$conectar->exec($update);

echo "<script>alert('Successfully Edit The Account!'); window.location='index.php'</script>";


?>

