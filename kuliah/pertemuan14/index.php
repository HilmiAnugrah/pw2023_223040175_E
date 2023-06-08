<?php 

require('functions.php');
$mahasiswa = query('SELECT * FROM mahasiswa');
//cek apakah tombol cari pernah di pencet atau belum
if(isset($_POST["search"])){
    $mahasiswa = cari($_POST['keyword']);
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

<h1>DATA MAHASISWA</h1>

<a href="tambah.php">TAMBAH DATA MAHASISWA</a><br>


<form action="" method="post" style="margin-top:50px;">
    <input type="search" name="keyword" placeholder="Masukan Keyword Pencarian.." autofocus autocomplete="off" size="50" style="padding:12px;">
    <button type='submit' name='search' style="padding:12px;">Cari</button>
</form>
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
    </tr>`
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
</body>
</html>