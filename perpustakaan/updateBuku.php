<?php

require 'function/function.php';

if(!isset($_GET['no_buku'])){
    echo"<script>alert('link gagal');</script>";
    header("Location: index.php");
}else{
    $no_buku = $_GET['no_buku'];
    $data = query("SELECT * FROM `tb_buku` WHERE no_buku = '$no_buku'")[0]; 
}

if(isset($_POST['submit'])){
    if(updateBuku($_POST) > 0){
        echo"<script>alert('Berhasil Update');</script>";
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
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <!-- awal form -->
    <div class="container">
        <h1 class="text-center my-3">Update Buku</h1>
        <form class="border p-3 mb-5" action="" method="post">
            <input type="hidden" name="no_buku" value="<?= $data['no_buku']?>">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $data['judul']?>">
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang"
                    value="<?= $data['pengarang']?>">
            </div>
            <div class="mb-3">
                <label for="th_terbit" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" id="th_terbit" name="th_terbit"
                    value="<?= $data['th_terbit']?>">
            </div>
            <div class="mb-3">
                <label for="jenis_buku" class="form-label">Jenis Buku</label>
                <select class="form-select" aria-label="Default select example" name="jenis_buku"">
                    <option selected>Pilih Jenis Buku</option>
                    <option value=" fiksi">Fiksi</option>
                    <option value="non-fiksi">Non-Fiksi</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="">Status Buku</label>
                <select class="form-select" aria-label="Default select example" name="status" required>
                    <option selected>Pilih Status Buku</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="dipinjam">Dipijam</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <br>
        </form>
    </div>
    <!-- akhir form -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>