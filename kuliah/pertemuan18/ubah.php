<?php 

session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

//konek dbms
require('functions.php');
//apakah tombol submit sudah di tekan atau belum
$id = $_GET['id'];
$mahasiswa =query("SELECT * FROM mahasiswa WHERE id = $id")[0];
if (isset($_POST['submit'])){
// cek apakah data berhasil di tambahkan atau tidak?
  ubah($_POST);
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

    <form action="" method='post' enctype='multipart/form-data'>
        <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
        <input type="hidden" name="gambarLama" value="<?= $mahasiswa['gambar']; ?>">
        <ul>
            <li>
                <label for="nrp">NRP</label>
                <input type="text" name='nrp' id='nrp' value= "<?= $mahasiswa['nrp']; ?>">


            </li>
            <li>
                <label for="nama">nama</label>
                <input type="text" name='nama' id='nama'value= "<?= $mahasiswa['nama']; ?>">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name='email' id='email'value= "<?= $mahasiswa['email']; ?>">
            </li>
            <li>
                <label for="jurusan">jurusan</label>
                <input type="text" name='jurusan' id='jurusan'value= "<?= strtolower($mahasiswa['jurusan']); ?>">
            </li>
            <li>
                
                <img src="img/<?= $mahasiswa['gambar'];?>" width="80" alt=""> <br>
                <input type="file" name='gambar' >
            </li>
            <br>
            <li>
                <button type='submit' name='submit'>ubah Data!</button>
            </li>
        </ul>
    </form>

    <a href="index.php">kembali kehalaman utama</a>
</body>
</html>