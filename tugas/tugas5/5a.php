<?php 

$mahasiswa = [
    [
        "nrp" => "223040175",
        "nama" => "Hilmi Anugrah Bela Negara    ",
        "email" => "Hilmi.223044175@mail.unpas.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "https://storage.googleapis.com/assets-edlink/p/thumb-e9bf345400cd5ff59e1eb396db669788267eb15abf085e3178f978e7ea1af406-img-20220927-144233-5128513620500898.jpg"
    ],
    [
        "nrp" => "223040166",
        "nama" => "MUHAMAD RINALDI AGUS PRATAMA",
        "email" => "rinaldi.223040166@mail.unpas.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "https://storage.googleapis.com/assets-edlink/p/thumb-557316eef49a1c68d6ef5324df64ecc123e0df47e935f43189bae1ca29119d15-img-20220922-093854-3286185462867630594.jpg"
    ],
    [
        "nrp" => "223040180",
        "nama" => "TEGAR SAMUDRA",
        "email" => "tegar.223040180@mail.unpas.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "https://storage.googleapis.com/assets-edlink/p/thumb-5c1f95bd7f1f1f4699d450501ba133a01f3481c549a3ef16c2e80c760f3afa20-img-20221206-092022-6305603904430470439.jpg"
    ],
    [
        "nrp" => "223040167",
        "nama" => "MUHAMAD RIZKI MAULANA",
        "email" => "rizki.223040167@mail.unpas.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "https://storage.googleapis.com/assets-edlink/p/thumb-7bb72645137298bfadf1bf691dc8e14bc0a6309011045a02f1fb82d27fedc606-img-20220927-141635-1527231034083600655.jpg"
    ],
    [
        "nrp" => "223040152",
        "nama" => "NAUFAL SAYYID AKBAR",
        "email" => "naufal.223040152@mail.unpas.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "https://storage.googleapis.com/assets-edlink/p/thumb-fc1657a792b811cd70b3691d5b02471e1b10dea3227a1fa73ab101d14fb571a1-img-20220929-191014-3349495824430964855.jpg"
    ],
    [
        "nrp" => "223040159",
        "nama" => "ADITYA FAUZAN SALMANNAUFAL",
        "email" => "aditya.223040159@mail.unpas.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "https://storage.googleapis.com/assets-edlink/p/thumb-25d5d10c29563179af2a2a6451f1ee82ad5a67e2df745b8b9000b861469b5ab8-347478.jpg"
    ],
    [
        "nrp" => "223040149",
        "nama" => "PEBRY ANDRIAN",
        "email" => "febry.223040149@mail.unpas.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "https://storage.googleapis.com/assets-edlink/p/thumb-7692a90842f07b8317a12aacb0440e61af3e5eeace99b6820f7d1487d8bbda43-whatsapp-image-2022-08-25-at-17.57.35.jpeg"
    ],
    [
        "nrp" => "223040173",
        "nama" => "Ryan Hidayat",
        "email" => "ryan.223040173@mail.unpas.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "https://storage.googleapis.com/assets-edlink/p/thumb-0b14d7850a56cdcaef9b48464ae849b76d40d6f54db7c103ff0d8197ca5205a4-dsc-0142.jpg"
    ],
    
    [
        "nrp" => "223040151",
        "nama" => "ADRIAN MUHAMMAD ZIDAN",
        "email" => "adrian.223040151@mail.unpas.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "https://storage.googleapis.com/assets-edlink/p/thumb-6f1722416eb1c16fbe8717218e33a2e263cc9a46c7356695a97dadaf61f10b42-adrian.jpg"
    ],
    
    [
        "nrp" => "223040156",
        "nama" => "Narapati Keysa Anandi",
        "email" => "narapati.223040155@mail.unpas.ac.id",
        "jurusan" => "Teknik Informatika",
        "gambar" => "https://storage.googleapis.com/assets-edlink/p/thumb-cafe954742d93b3d882339023ca399240da58b4497ca672a8fadfe0baff67a5b-dsc-8633.png"
    ]
    
]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>

    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>
                <img src="<?= $mhs["gambar"]; ?>"  alt="">
            </li>
            <li>Nama : <?= $mhs["nama"]; ?></li>
            <li>NRP : <?= $mhs["nrp"]; ?></li>
            <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
        </ul>

    <?php endforeach; ?>

</body>

</html>