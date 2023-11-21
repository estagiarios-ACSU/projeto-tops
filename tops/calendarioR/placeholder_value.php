<?php
// $array = "deu";

include "Conn.php";

$conn = new Conn('tutorial');
$connect = $conn->connectDb();


$array = array();

if(isset($_POST['event_id'])){
    $id = $_POST['event_id'];
    
    $query = "SELECT title, description, color FROM events WHERE id = '$id'";
    $result = $connect->prepare($query);
    $result->execute();


    foreach($result as $new){
        extract($new);
        $array['title'] = $title;
        $array['description'] = $description;
        $array['color'] = $color;
        // $array = $title;
    }
} 


echo json_encode($array);
?>