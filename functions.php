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

// Fungsi untuk menambahkan data mahasiswa
function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars(ucwords($data['nama']));
    $nrp = htmlspecialchars(strtoupper($data['nrp']));
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars(strtoupper($data['jurusan']));

    // Upload Gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // cek apakah data sudah di diisi atau belum
    if (!empty($data['nrp'])){
    $query = "INSERT INTO mahasiswa (nama, nrp, email, jurusan, gambar)
              VALUES ('$nama', '$nrp', '$email', '$jurusan', '$gambar')";
    $result = mysqli_query($conn, $query);
    }
    return mysqli_affected_rows($conn);
}

// Fungsi untuk menghapus data mahasiswa berdasarkan ID
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// Fungsi untuk mengubah data mahasiswa
function ubah($data)
{
    global $conn;
    $id = $data['id'];
    $nama = htmlspecialchars(ucwords($data['nama']));
    $nrp = htmlspecialchars(strtoupper($data['nrp']));
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars(strtoupper($data['jurusan']));
    $gambarLama = htmlspecialchars($data['gambarLama']);

    //cek apakah user pilih gambar baru atau tidak

    if ($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    // Query update data
    $query = "UPDATE mahasiswa SET 
                nama = '$nama',
                nrp = '$nrp',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
              WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>
                alert('Data berhasil diubah');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah');
                document.location.href = 'index.php';
              </script>";
    }
    return mysqli_affected_rows($conn);
}

// Fungsi untuk mencari data mahasiswa berdasarkan keyword
function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa
              WHERE 
              nama LIKE '%$keyword%' OR
              nrp LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%'";
    return query($query);
}

// Fungsi untuk melakukan upload gambar
function upload()
{
    $namaFiles = $_FILES['gambar']['name'];
    $ukuranFiles = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<div>Pilih gambar terlebih dahulu</div>";
        return false;
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFiles);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<div>Type gambar harus jpg, jpeg, atau png</div>";
        return false;
    }

    // Cek jika ukurannya terlalu besar
    if ($ukuranFiles > 1000000) {
        echo "<div>Ukuran gambar harus kurang dari 1MB</div>";
        return false;
    }
    
    // Lolos pengecekan gambar, siap diupload
    //generate nama baru 
    $namaFilesBaru = uniqid();
    $namaFilesBaru .= '.';
    $namaFilesBaru .=$ekstensiGambar;
    move_uploaded_file($tmpName, "img/" . $namaFilesBaru);
    return $namaFilesBaru;
}


function registrasi($data){
  global $conn;
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data['password']);
  $password2 = mysqli_real_escape_string($conn ,$data['konfirmasi-password']);

  // cek apakah input kosong atau tidak 
  if (empty($username) || empty($password) || empty($password2)) {
    echo "<script>
    alert('username dan password tidak boleh kosong ')    
</script>";
    return false;
  }

  //cek username sudah ada atau belum
  $queryDataUser= "SELECT username FROM user WHERE username = '$username'";
  $result = mysqli_query($conn,$queryDataUser);
  if (mysqli_fetch_assoc($result)){
     
      return false;
  }
  //cek konfirmasi password

  if($password !== $password2){
      echo "<script>
              alert('Password dan Konfirmasi Password tidak sesuai!!');
          </>";
          return false;
  }
  //enkripsi password 
      $password = password_hash($password, PASSWORD_DEFAULT);
    
  //tambahkan user baru ke database
  $query = "INSERT INTO user VALUES(null,'$username','$password')";

  mysqli_query($conn,$query);
  return mysqli_affected_rows($conn);
}


