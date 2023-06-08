<?php 

$servername = "localhost"; // Ganti dengan nama server Anda
$username = "root"; // Ganti dengan username database Anda
$password = "hayde"; // Ganti dengan password database Anda
$dbname = "phpdasar"; // Ganti dengan nama database Anda
//koneksi ke database
$conn = mysqli_connect($servername,$username, $password, $dbname); 

//ambil  query
$result = mysqli_query($conn,'SELECT * FROM mahasiswa');

//    while($mhs= mysqli_fetch_assoc($result) ){
//     var_dump($mhs);
// }
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
    <table cellpadding='10' cellspacing='0' border='1'>
    <tr>
        <th>NO.</th>
        <th>AKSI</th>
        <th>GAMBAR</th>
        <th>NRP</th>
        <th>NAMA</th>
        <th>EMAIL</th>
        <th>JURUSAN</th>
    </tr>`
    <?php $i=1;?>
    <?php while($row= mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="">ubah</a>|
            <a href="">hapus</a>
        </td>
        <td><img src="gambar/<?php echo $row["gambar"]; ?>"  alt="hilmi" width='80'></td>
        <td><?= $row['nrp']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['jurusan']; ?></td>
        
    </tr>

    <?php $i++ ?>
    <?php endwhile; ?>
    </table>
</body>
</html>