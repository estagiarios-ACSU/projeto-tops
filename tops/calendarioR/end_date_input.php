<?php

include "Conn.php";

$conn = new Conn('tutorial');
$connect = $conn->connectDb();

if(isset($_POST['event_id'])){
    $id = $_POST['event_id'];
    
    $query = "SELECT end_date FROM events WHERE id = '$id'";
    $result = $connect->prepare($query);
    $result->execute();

    $date = null;

    foreach($result as $new){
        extract($new);
        $date = $end_date;
    }
    echo json_encode($date);
} 

if(isset($_POST['top'])){
    $a = "acdsadasdsad";
    echo json_encode($a);
}
?>