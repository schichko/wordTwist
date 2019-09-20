<?php
session_start();


if (!isset($_SESSION["name"])){
    if($_POST['receiver_name'] != null){
        $_SESSION["name"] = $_POST['receiver_name'];
    }
} else {
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    echo json_encode($_SESSION["name"]);
}
?>