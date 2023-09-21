<?php

include "Conn.php";
include "fetchevents.php";

$conn = new Conn();
$connect = $conn->connectDb();

$query = "SELECT * FROM events";
$result = $connect->prepare($query);
$result->execute();

$uniqueEvents = [];
$eventIds = [];
foreach ($result as $event) {
    if (!in_array($event['id'], $eventIds)) {
        $uniqueEvents[] = $event;
        $eventIds[] = $event['id'];
    }
}

$response = array();
foreach($uniqueEvents as $row){
    $response[] = array(
        "eventid" => $row['id'],
        "title" => $row['title'],
        "description" => $row['description'],
        "start" => $row['start_date'],
        "end" => $row['end_date'],
    );
}

// Retorna os eventos únicos para o calendário
echo json_encode($response);
?>