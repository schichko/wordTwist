<?php
session_start();

$verb = $_SERVER["REQUEST_METHOD"];

if ($verb === "POST"){
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
        $_SESSION["correctGuesses"] = $_POST['correctGuesses'];
    }
} 
else if ($verb === "GET"){
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    if(!isset($_SESSION["name"]) || !isset($_SESSION["rack"]) || !isset($_SESSION["wordList"]) || !isset($_SESSION["correctGuesses"])){
        echo json_encode("Empty");
    }else{
        $dbSigning_array = array($_SESSION["name"],$_SESSION["rack"],$_SESSION["wordList"],$_SESSION["correctGuesses"]);
        echo json_encode($dbSigning_array);
    }
}

?>