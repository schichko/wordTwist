<?php
session_start();



if ($_SERVER['REQUEST_METHOD'] == "POST")){
    if($_POST['receiver_name'] != null){
        $_SESSION["name"] = $_POST['receiver_name'];
    }
    if($_POST['rack'] != null){
        $_SESSION["rack"] = $_POST['rack'];
    }
    if($_POST['wordList'] != null){
        $_SESSION["wordList"] = $_POST['wordList'];
    }
    if($_POST['correctGuesses'] != null){
        $_SESSION["correctGuesses"] = $_POST['correctGuesses']
    }
} 

if ($_SERVER['REQUEST_METHOD'] == "GET")){
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    $dbSigning_array = array($_SESSION["name"],$_SESSION["rack"],$_SESSION["wordList"].$_SESSION["correctGuesses"]);
    echo json_encode($dbSigning_array);
}
?>