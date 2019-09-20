<?php
session_start();



if (!isset($_SESSION["name"])){
    if($_POST['receiver_name'] != null){
        $_SESSION["name"] = $_POST['receiver_name'];
    }
    if($_POST['rack'] != null){
        $_SESSION["rack"] = $_POST['rack'];
    }
} else {
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    $dbSigning_array = array($_SESSION["name"],$_SESSION["rack"]);
    echo json_encode($dbSigning_array);
}
?>