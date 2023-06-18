<?php

session_start();
if(isset($_SESSION["login"])){
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
    $emailUser = isset($_SESSION['email']) ? $_SESSION['email'] : "";
    $encodeUser= base64_encode($username);
    $encodeEmail=base64_encode($emailUser);
}




require('functions.php');
//apakah tombol submit sudah di tekan atau belum
$id = $_GET['id'];
$user =query("SELECT * FROM user WHERE id = $id")[0];
if (isset($_POST['ubah'])){
// cek apakah data berhasil di tambahkan atau tidak?
  ubah($_POST);
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit.css">
       <!-- botstraplink -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- <link rel="stylesheet" href="main.css" /> -->
    <?php require "view/partials/meta.php"; ?>
    <title>Hayde | Edit</title>

</head>
<body>

<button class="back" onclick="window.history.back()"><i class='bx bx-left-arrow-alt'></i>Back</button>





<section class="form-edit" id="form-edit">
<div class="judul-container">
    <h2>Ubah Data User</h2>
</div>

<form action="" method="post" enctype='multipart/form-data'>
<input type="hidden" name="id" value="<?= $user['id']; ?>">
<input type="hidden" name="gambarLama" value="<?= $user['image']; ?>">
             
                    <div class="username">
                        <label for="username">Username<span class="required"></span></label>
                        <?php if(isset($notSpasi)): ?>
                            <p style="color:red; font-style:italic;">Username tidak boleh mengandung spasi!!</p>
                        <?php endif; ?>
                        <input type="text" name="username" id="username" placeholder="Nama Anda" autofocus required value="<?= $user['username']; ?>">
                    </div>
                    <div class="email">
                        <label for="email">Email<span class="required"></span></label>
                        <input type="email" name="email" id="email" placeholder="Email" required value="<?= $user['email']; ?>">
                    </div>
                    <div class="upload">
                        <label for="upload">Photo Profile<span class="required"></span></label>
                        <div class="image-view">
                        <img src="image/<?= $user['image']; ?>" alt="" width="50">
                        <input type="file" name="image" id="upload" placeholder="upload" >

                    </div>
                    </div>
                    <div class="password">
                        <label for="password">Password<span class="required"></span></label>
                        <input type="password" name="password" id="password" placeholder="**********">
                    </div>
                    <div class="konfirmasi-password">
                        <label for="konfirmasi-password">Konformasi Password<span class="required"></span></label>
                        <input type="password" name="konfirmasi-password" id="konfirmasi-password" placeholder="**********">
                    </div>
                    <div class="button-log-reg">
                    <button type="submit" name="ubah">Ubah Data</button>
                    </div>
                </form>
</section>
</body>
</html>