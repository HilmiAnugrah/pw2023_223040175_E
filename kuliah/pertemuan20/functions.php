<?php 

$servername = "localhost"; // Ganti dengan nama server Anda
$username = "root"; // Ganti dengan username database Anda
$password = "hayde"; // Ganti dengan password database Anda
$dbname = "phpdasar"; // Ganti dengan nama database Anda
//koneksi ke database
$conn = mysqli_connect($servername,$username, $password, $dbname); 
//    while($mhs= mysqli_fetch_assoc($result) ){
//     var_dump($mhs);
// }

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows= [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[]=$row;
    }
    return $rows;
}


?>