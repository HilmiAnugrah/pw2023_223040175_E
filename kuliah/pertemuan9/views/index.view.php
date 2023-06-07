<?php  $students = [
        ['nama'=>'hilmianugrah',
        'npm'=>'223040175',
        'email'=>'hilmianugrah2003@gmail.com'
        ],
        ['nama'=>'Herdy',
        'npm'=>'223040164',
        'email'=>'herdy@gmail.com'
        ],
    ]; ?>
<!doctype html>
<html lang="en">
    
  <?php require("partials/header.php") ?>
  <body>
    
    <?php require ('partials/nav.php'); ?>
<div class="container">
    <h1>Halaman Home</h1>
    <h3>daftar mahasiswa</h3>
    <?php foreach ($students as $student): ?>
        <ul>
            <li>Nama : <?= $student['nama']; ?></li>
            <li>Npm : <?= $student['npm']; ?></li>
            <li>Email : <?= $student['email']; ?></li>
        </ul>
    <?php endforeach; ?>
</div>
    <?php require("partials/footer.php") ?>