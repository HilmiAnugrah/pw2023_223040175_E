<?php
session_start();
if(isset($_SESSION["login"])){
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
    $emailUser = isset($_SESSION['email']) ? $_SESSION['email'] : "";
    $encodeUser= base64_encode($username);
    $encodeEmail=base64_encode($emailUser);
    header("Location: dashboard.php?username=".$encodeUser ."&email=".$encodeEmail);
    exit;
}
require "functions.php";
require("view/register.view.php");





