<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require('functions.php');

    $jumlahDataPerHalaman= 2;
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");


//cek apakah input keyword ada atau tidak jika ada maka eksekusi
if (!empty($_POST['keyword'])) {
//cek apakah tombol cari pernah di pencet atau belum
if(isset($_POST["search"])){
    $mahasiswa = cari($_POST['keyword']);
    if (count($mahasiswa) == 0 ){
        $hidden = true;
    }
    $pagination =true;// tapi jika tombol cari tidak di tekan maka script ini true
}
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conection to database</title>
</head>
<body>
<a href="logout.php">Logout</a>
<h1>DATA MAHASISWA</h1>
<a href="tambah.php">TAMBAH DATA MAHASISWA</a><br>
 
<form action="" method="post" style="margin-top:50px;">
    <input type="search" name="keyword" placeholder="Masukan Keyword Pencarian.." autofocus autocomplete="off" size="50" style="padding:12px;" id="keyword">
    <button type='submit' name='search' style="padding:12px;" id="tombol-cari">Cari</button>
</form>

<!-- navigasi pagination -->
<?php if(!isset($pagination)): // cek ketika tombol search di tekan maka sscript ini true?>
<a href="?halaman=<?= max($halamanAktif - 1, 1); ?>">&laquo;</a>


<?php for ($i=1; $i <= $jumlahHalaman ; $i++) : ?>

    <!-- cek jika halaman aktif maka tampilkan style berbeda -->
    <?php if ($i == $halamanAktif): ?>
<a href="?halaman=<?= $i; ?>"style="color:red; font-weight:bold; font-size:1.1em;"><?= $i; ?></a>
        <?php else: ?>
<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
<?php endfor; ?>
<a href="?halaman=<?= ($halamanAktif < $jumlahHalaman) ? $halamanAktif + 1 : $halamanAktif; ?>">&raquo;</a>

<?php endif; ?>


<!-- tabel kita -->

<div id="container">
    <table cellpadding='10' cellspacing='0' border='1'>
    <tr>
        <th>NO.</th>
        <th>AKSI</th>
        <th>GAMBAR</th>
        <th>NRP</th>
        <th>NAMA</th>
        <th>EMAIL</th>
        <th>JURUSAN</th>
        <th>Broadcast</th>
    </tr>
    <?php if (isset($hidden) && $hidden) : ?>
    <h2 style="color:red; font-style:italic;">Data yang Anda cari tidak ada!</h2>
<?php endif; ?>
    <?php $i=1;?>
    <?php foreach( $mahasiswa as $row) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="ubah.php?id=<?= $row['id']; ?>">ubah</a>|
            <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('yakin?');">hapus</a>
        </td>
        <td><img src="img/<?= $row["gambar"]; ?>"  alt="gambar" width='80' height="80"></td>
        <td><?= $row['nrp']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['jurusan']; ?></td>
        <td><a href="">kirm pesan</a></td>
        
    </tr>

    <?php $i++; ?>
    <?php endforeach; ?>
    </table>
    </div>
    <script src="js/script.js"></script>
</body>
</html>