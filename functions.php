<?php
$servername = "localhost"; // Ganti dengan nama server Anda
$username = "root"; // Ganti dengan username database Anda
$password = "hayde"; // Ganti dengan password database Anda
$dbname = "phpdasar"; // Ganti dengan nama database Anda

// Koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Fungsi untuk menjalankan query dan mengembalikan hasilnya dalam bentuk array asosiatif
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['konfirmasi-password']);

    if (empty($username) || empty($email) || empty($password) || empty($password2)) {
        $require = true;
        return false;
    }

    // Validasi username
    if (strpos($username, ' ') !== false) {
        echo "<script>
            alert('Username tidak boleh mengandung spasi.');
        </script>";
        $notSpasi = true;
        return false;
    }
    
    if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        echo "<script>
            alert('Username hanya boleh terdiri dari huruf dan angka.');
        </script>";
        return false;
    }

    

    // Cek username dan email sudah ada atau belum
    $queryDataUserByUsername = "SELECT username FROM user WHERE username = '$username'";
    $queryDataUserByEmail = "SELECT username FROM user WHERE email = '$email'";

    $resultByUsername = mysqli_query($conn, $queryDataUserByUsername);
    $resultByEmail = mysqli_query($conn, $queryDataUserByEmail);

    if (mysqli_fetch_assoc($resultByUsername) || mysqli_fetch_assoc($resultByEmail)) {
        echo "<script>
            alert('Username atau email sudah terdaftar');
            window.location.href = 'login.php';
        </script>";
        return false;
    }

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('Password dan Konfirmasi Password tidak sesuai!!');
        </script>";
        return false;
    }

    // Enkripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);
  
    // Tambahkan user baru ke database
    $query = "INSERT INTO user VALUES(null,'$username','$email','$password')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


