<?php 


$id = $_GET['id'];
require('functions.php');
if (hapus($id) > 0){
    ECHO "<script>
            alert('Data Berhasil Dihapus');
            document.location.href='index.php'; 
         </script>";
}else{
    ECHO "<script>
    alert('gagal di Hapus');
    document.location.href='index.php'; 
 </script>";
}