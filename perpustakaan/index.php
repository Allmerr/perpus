<?php

require "function/function.php";

$data_anggota = query("SELECT * FROM `tb_anggota`");
$data_buku = query("SELECT * FROM `tb_buku`");


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="">
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
    <!-- tampilan record -->
    <div class="container">
        <h1 class="mt-5">Anggota Perpustakaan</h1>
        <table class="table table-striped mt-3 border">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kota</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Fungsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                <?php foreach($data_anggota as $record) : ?>
                <tr>
                    <?php $count++; ?>
                    <th scope="row"><?= $count?></th>
                    <td><?= $record['nama']?></td>
                    <td><?= $record['alamat']?></td>
                    <td><?= $record['kota']?></td>
                    <td><?= $record['no_telp']?></td>
                    <td><?= $record['tgl_lahir']?></td>
                    <td>
                        <a href="hapusAnggota.php?id_anggota=<?= $record['id_anggota']?>"
                            class="link-danger text-center">Hapus</a>
                        <a href="updateAnggota.php?id_anggota=<?= $record['id_anggota']?>"
                            class="link-success text-center">Update</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <!-- akhir tampilan record -->
    <!-- tampilan record -->
    <div class="container">
        <h1 class="mt-5">Daftar Buku</h1>
        <table class="table table-striped mt-3 border">
            <thead>
                <tr>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pengarang</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Jenis Buku</th>
                    <th scope="col">Status</th>
                    <th scope="col">Fungsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data_buku as $record) : ?>
                <tr>
                    <th scope="row"><?= $record['no_buku']?></th>
                    <td><?= $record['judul']?></td>
                    <td><?= $record['pengarang']?></td>
                    <td><?= $record['th_terbit']?></td>
                    <td><?= $record['jenis_buku']?></td>
                    <?php if($record['status'] === 'tersedia') : ?>
                    <td class="text-success"><?= $record['status']?></td>
                    <?php endif ?>
                    <?php if($record['status'] === 'dipinjam') : ?>
                    <td class="text-danger"><?= $record['status']?></td>
                    <?php endif ?>
                    <td>
                        <a href="hapusBuku.php?no_buku=<?= $record['no_buku']?>"
                            class="link-danger text-center">Hapus</a>
                        <a href="updateBuku.php?no_buku=<?= $record['no_buku']?>"
                            class="link-success text-center">Update</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <!-- akhir tampilan record -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>