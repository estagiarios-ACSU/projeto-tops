<?php
require_once('Conn.php');

$get_id=$_GET['student_id'];

// sql to delete a record
$conn = new Conn();
$conectar = $conn->connectDb();

$delete = "Delete from student where student_id = '$get_id'";
$conectar->prepare($delete);

// use exec() because no results are returned
$conectar->exec($delete);
header('location:index.php');
?>