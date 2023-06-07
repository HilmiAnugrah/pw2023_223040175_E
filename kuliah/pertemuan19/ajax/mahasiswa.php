<?php 
require '../functions.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM mahasiswa
              WHERE 
              nama LIKE '%$keyword%' OR
              nrp LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%'";
$mahasiswa = query($query);
?>

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