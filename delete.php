<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$emailUser = isset($_SESSION['email']) ? $_SESSION['email'] : "";
$encodeUser= base64_encode($username);
$encodeEmail=base64_encode($emailUser);
$id = $_GET['id'];
require('functions.php');
if (hapus($id) > 0){
    echo "<script>
            alert('Data Berhasil Dihapus');
            window.location.href = 'dashboard.php?username=" . $encodeUser . "&email=" . $encodeEmail . "';
         </script>";
}else{
    echo "<script>
            alert('Gagal dihapus');
            window.location.href = 'dashboard.php?username=" . $encodeUser . "&email=" . $encodeEmail . "';
        </script>";
}

