<?php 
session_start();
if(isset($_SESSION["login"])){
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
    $emailUser = isset($_SESSION['email']) ? $_SESSION['email'] : "";
    $encodeUser= base64_encode($username);
    $encodeEmail=base64_encode($emailUser);
}
require('view/index.view.php'); 
