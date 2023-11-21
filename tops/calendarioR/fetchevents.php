<?php

session_start();

if(isset($_SESSION['top'])){
    $top = $_SESSION['top'];
}

include "config.php";
include "Conn.php";

$Conn = new Conn();
$connect = $Conn->connectDb();
$query = "SELECT * FROM events WHERE top='".$top."'";
$result = $connect->query($query);


$dates = [];
$days = [];


$number_days = range(1, 31);

// Esse for pegar a end_date e colocar o ano e o mês em um array e o dia em outro array
foreach($result as $event){
    extract($event);
    // array_push($dates, $end_date);
    $data_pieces = explode("-", $end_date);
    array_push($dates, $data_pieces[0]."-".$data_pieces[1]);
    array_push($days, $data_pieces[2]);
}

// var_dump($dates);
// var_dump($days);

$true = true;
$new_date = [];

// Esses for mudam o dia da data, ou seja, adcionam mais 1
foreach($days as $date){
    foreach($number_days as $num){
        // echo "0".$num . "  ";
        if($date == 31 and $true == true){
            $date = "01";
            array_push($new_date, $date);
        }
        if ($date == 9 and $true == true){
            $date = "10";
            array_push($new_date, $date);
            $true = false;
        } elseif("0".$num == $date and $date < 10 and $true == true){
            $date = "0" . $date + 1;
            array_push($new_date, $date);
            $true = false;
        } else if($date >= 10 and $true == true){
            $date = $date + 1;
            array_push($new_date, $date);
            $true = false;
        } 
    }
    $true = true;
    // break;
}

// var_dump($new_date);

$dates_new = [];
$true_date = true;
$controle = 0;
$controle2 = 0;


// Esses for servem para adcionar a nova data aos array usando a logica dos controle
foreach($dates as $date_new){
    $day_date = $date_new;

    foreach($new_date as $day){
        if($controle == $controle2 and $day == 01){
            $dividir = explode("-", $date_new);
            $day_date = $dividir[0] . "-". intval($dividir[1]) + 1 . "-" . $day;
            // echo $day_date;
            array_push($dates_new, $day_date);
            break;
        }
        if($controle == $controle2){
            $day_date = $date_new . "-". $day;
            array_push($dates_new, $day_date);
            break;
        }
        $controle2 += 1;
        // echo $controle2 . "<br>";
    }
    $controle += 1;
    // echo $controle . "<br><br><br><br>";
    $controle2 = 0;  
}

// var_dump($dates_new);


// Essa parte é para mostrar no calendario os eventos
$query_calendar = "SELECT * FROM events WHERE top='".$top."'";
$result_calendar = $connect->query($query_calendar);
$response = [];
$new_controle = 0;

foreach($result_calendar as $evente){
    extract($evente);

    $response[] = array(
        "eventid" => $id,
        "title" => $title,
        "color" => $color,
        "description" => $description,
        "start" => $start_date,
        "end" => $dates_new[$new_controle],
    );
    $new_controle += 1;
}

// var_dump($response);

echo json_encode($response);
exit;
