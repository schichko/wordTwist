<?php
session_start();



if (!isset($_SESSION["name"])){
    if($_POST['receiver_name'] != null){
        $_SESSION["name"] = $_POST['receiver_name'];
    }
    if($_POST['rack'] != null){
        $_SESSION["rack"] = $_POST['rack'];
    }
    if($_POST['wordList'] != null){
        $_SESSION["wordList"] = $_POST['wordList'];
    }
} else {
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    $dbSigning_array = array($_SESSION["name"],$_SESSION["rack"],$_SESSION["wordList"]);
    echo json_encode($dbSigning_array);
}
?>