<?php
session_start();
require "functions.php";

if (isset($_POST['register'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
                window.location.href='dashboard.php';
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}

require("view/register.view.php");





