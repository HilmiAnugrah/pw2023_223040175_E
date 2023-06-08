<?php 

session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

//konek dbms
require('functions.php');
//apakah tombol submit sudah di tekan atau belum

if (isset($_POST['submit'])){
// cek apakah data berhasil di tambahkan atau tidak?
    

   if (tambah($_POST) > 0){
    ECHO "<script>
            alert('Data Berhasil dikirim');
            document.location.href='index.php'; 
         </script>";
   }else{
    ECHO "<script>
            alert('gagal di tambahakan');
            document.location.href='tambah.php'; 
         </script>";
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nrp">NRP</label>
                <input type="text" name='nrp' id='nrp'>
            </li>
            <li>
                <label for="nama">nama</label>
                <input type="text" name='nama' id='nama'>
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name='email' id='email'>
            </li>
            <li>
                <label for="jurusan">jurusan</label>
                <input type="text" name='jurusan' id='jurusan'>
            </li>
            <li>
                <label for="gambar">gambar</label>
                <input type="file" name="gambar" id='gambar'>
            </li>
            <li>
                <button type='submit' name='submit'>Tambah Data!</button>
            </li>
        </ul>
    </form>

    <a href="index.php">kembali kehalaman utama</a>
</body>
</html>