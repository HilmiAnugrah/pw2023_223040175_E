<?php 

$servername = "localhost"; // Ganti dengan nama server Anda
$username = "root"; // Ganti dengan username database Anda
$password = "hayde"; // Ganti dengan password database Anda
$dbname = "phpdasar"; // Ganti dengan nama database Anda
//koneksi ke database
$conn = mysqli_connect($servername,$username, $password, $dbname); 
//    while($mhs= mysqli_fetch_assoc($result) ){
//     var_dump($mhs);
// }

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows= [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[]=$row;
    }
    return $rows;
}

function tambah($data){

    global $conn;
    $nama = htmlspecialchars(ucwords($data['nama']));
    $nrp =htmlspecialchars(strtoupper($data['nrp']));
    $email =htmlspecialchars($data['email']);
    $jurusan =htmlspecialchars(strtoupper($data['jurusan']));
    $gambar =htmlspecialchars(strtoupper($data['gambar']));
    //query insert data
    $error="NRP, tidak boleh kosng";
    if(!empty($nrp) ){
    $query = "INSERT INTO mahasiswa (nama, nrp, email, jurusan, gambar)
    VALUES ('$nama', '$nrp', '$email', '$jurusan', '$gambar')";
    $result = mysqli_query($conn, $query);
        ECHO "<script>
            alert('Data Berhasil dikirim');
            document.location.href='index.php'; 
         </script>";
}else{
    ECHO "<script>
            alert('gagal di tambahakan');
            document.location.href='index.php'; 
         </script>";
}
return mysqli_affected_rows($conn);
}


function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data){

    global $conn;
    $id = $data['id'];
    $nama = htmlspecialchars(ucwords($data['nama']));
    $nrp =htmlspecialchars(strtoupper($data['nrp']));
    $email =htmlspecialchars($data['email']);
    $jurusan =htmlspecialchars(strtoupper($data['jurusan']));
    $gambar =htmlspecialchars(strtoupper($data['gambar']));
    //query insert data
    $error="NRP, tidak boleh kosng";
    if(!empty($nrp) ){
    $query = "UPDATE mahasiswa SET 
            nama = '$nama',
            nrp = '$nrp',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id;
    ";
    $result = mysqli_query($conn, $query);
        ECHO "<script>
            alert('Data Berhasil dikirim');
            document.location.href='index.php'; 
         </script>";
}else{
    ECHO "<script>
            alert('gagal di tambahakan');
            document.location.href='index.php'; 
         </script>";
}
return mysqli_affected_rows($conn);
}


function cari($keyword){
    $query = "SELECT * FROM mahasiswa
                WHERE 
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' 
            ";
            return query($query);
}