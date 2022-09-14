<?php

require "function/function.php";

if(isset($_POST['submit'])){
    if(pinjamBuku($_POST) > 0){
        echo"<script>alert('Data berhasil ditambahkan!');</script>";
        header("Location: index.php");
    }
}




?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah buku</title>
    <link rel="stylesheet" href="css/anggota.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="anggota.php">Tambah Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="buku.php">Tambah Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pinjamBuku.php">Pinjam Buku</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <div class="container">
        <h1 class="text-center my-3">Pinjam Buku</h1>
        <form class="border p-3 mb-5" action="" method="post">
            <div class="mb-3">
                <label for="id_anggota" class="form-label">Anggota Peminjam</label>
                <select name="id_anggota" id="id_anggota" class="form-select">
                    <?php $data =  query("SELECT * FROM tb_anggota"); ?>
                    <?php foreach($data as $anggota ) :?>
                    <option value="<?= $anggota["id_anggota"]?>"><?= $anggota["nama"]?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="no_buku" class="form-label">Buku Tersedia</label>
                <select name="no_buku" id="no_buku" class="form-select">
                    <?php $data =  query("SELECT * FROM tb_buku"); ?>
                    <?php foreach($data as $buku ) :?>
                    <?php if($buku["status"] == "tersedia") : ?>
                    <option value="<?= $buku["no_buku"]?>"><?= $buku["judul"]?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Pinjam Buku</button>
            <br>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>