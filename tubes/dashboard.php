<?php
session_start();
require "functions.php";
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

$sayToHello= $_GET['username'];
$username = isset($_GET["username"]) ? base64_decode($_GET["username"]) : "";
$emailUser = isset($_GET["email"]) ? base64_decode($_GET["email"]) : "";


//query data user
$queryUser="SELECT * FROM user";
//setelah di query masukan ke $user
$users = query($queryUser);


require("view/dashboard.view.php");

