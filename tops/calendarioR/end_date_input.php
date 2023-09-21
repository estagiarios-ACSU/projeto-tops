<?php

include "../Conn.php";

$conn = new Conn('tutorial');
$connect = $conn->connectDb();

if(isset($_POST['event_id'])){
    $id = $_POST['event_id'];
    
    $query = "SELECT end_date FROM events WHERE id = '$id'";
    $result = $connect->prepare($query);
    $result->execute();

    $array = null;

    foreach($result as $new){
        extract($new);
        $array = $end_date;
    }
} 

echo json_encode($array);
?>