<?php

require "function/function.php";

if(!isset($_GET['id_anggota'])){
    echo"<script>alert('link gagal');</script>";
    header("Location: index.php");
}else{
    $id_anggota = $_GET['id_anggota'];
    $data = query("SELECT * FROM `tb_anggota` WHERE id_anggota = '$id_anggota'")[0]; 
}

if(isset($_POST['submit'])){
    if((updateAnggota($_POST)) > 0){
        echo"<script>alert('Berhasil Update');</script>";
        header("Location: index.php");
    }else{
        echo"<script>alert('Gagal Update');</script>";
        header("Location: index.php");
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
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
    <!-- awal form -->
    <div class="container">
        <h1 class="text-center my-3">Update Anggota</h1>
        <form class="border p-3 mb-5" action="" method="post">
            <input type="hidden" name="id_anggota" value="<?= $data['id_anggota']?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']?>">
            </div>
            <div class=" mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota" value="<?= $data['kota']?>">
            </div>
            <div class=" mb-3">
                <label for="no_telp" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $data['no_telp']?>">
            </div>
            <div class=" mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir"
                    value="<?= $data['tgl_lahir']?>">
            </div>
            <button type=" submit" class="btn btn-primary" name="submit">Submit</button>
            <br>
        </form>
    </div>
    <!-- akhir form -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>