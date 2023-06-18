<?php
$servername = "localhost"; // Ganti dengan nama server Anda
$username = "u1531698_hayde"; // Ganti dengan username database Anda
$password = "haydebismillah"; // Ganti dengan password database Anda
$dbname = "u1531698_haydeberita"; // Ganti dengan nama database Anda
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
    $query = "INSERT INTO user VALUES(null,'$username','$email','$password','')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// hapus data
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data){
    global $conn;
    $id = $data['id'];
    $nama = htmlspecialchars(strtolower($data['username']));
    $email = htmlspecialchars($data['email']);
    $password = $data['password']; // Password baru
    $gambarLama = htmlspecialchars($data['gambarLama']);
    // Periksa apakah password baru diisi atau tidak
    $encodeUser= base64_encode($nama);
    $encodeEmail=base64_encode($email);
      // Upload Gambar
      $gambar = upload();
      if (!$gambar) {
          return false;
      }
  
    
    if (!empty($password)) {
        // Hash password baru jika ada
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE user SET 
                    username = '$nama',
                    email = '$email',
                    password = '$hashedPassword',
                    image ='$gambar'

                  WHERE id = $id";
    } else {
        $query = "UPDATE user SET 
                    username = '$nama',
                    email = '$email',
                    image ='$gambarLama'
                  WHERE id = $id";
    }
  
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>
                alert('Data berhasil diubah');
                window.location.href = 'dashboard.php?username=" . $encodeUser . "&email=" . $encodeEmail . "';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah');
                window.location.href = 'dashboard.php?username=" . $encodeUser . "&email=" . $encodeEmail . "';
              </script>";
    }
    return mysqli_affected_rows($conn);
}
function upload()
{
    $namaFiles = $_FILES['image']['name'];
    $ukuranFiles = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

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
    move_uploaded_file($tmpName, "image/" . $namaFilesBaru);
    return $namaFilesBaru;
}
