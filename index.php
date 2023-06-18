<?php 
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";

// Ambil URL saat ini
$currentURL = $_SERVER['REQUEST_URI'];

// Tambahkan "/" di akhir URL untuk memastikan kecocokan dengan URL yang diharapkan
$currentURL = rtrim($currentURL, "/");

if ($currentURL == "/pw2023_223040175/tubes/index.php" || $currentURL == "/pw2023_223040175/tubes/") {
    if (isset($_SESSION["login"])) {
        $buttonText = "Dashboard";
        $buttonLink = "dashboard.php?username=" . urlencode($username);
    } else {
        $buttonText = "Masuk/Daftar";
        $buttonLink = "login.php";
    }
} else {
    $buttonText = "Masuk/Daftar";
    $buttonLink = "login.php";
}

require('view/index.view.php'); 
