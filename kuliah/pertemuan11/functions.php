<?php
// Sesuaikan dengan URL project kalian
define('BASE_URL', '/pw2023_223040175/kuliah/pertemuan11/');

function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', 'hayde', 'phpdasar') or die('KONEKSI GAGAL!');
  return $conn;
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data){
  $conn= koneksi();
  $nama= $data['nama'];
  $nrp= $data['nrp'];
  $email= $data['email'];
  $jurusan= $data['jurusan'];
  $gambar= $data['gambar'];

$query= "INSERT INTO mahasiswa
          VALUES 
          (null, '$nama', '$nrp', '$email','$jurusan','$gambar')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
  var_dump(mysqli_affected_rows($conn));
}



function dd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die;
}

function uriIS($uri)
{
  return ($_SERVER["REQUEST_URI"] === $uri) ? 'active' : '';
}
