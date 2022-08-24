<?php

require 'function/function.php';


if(isset($_GET['id_anggota'])){
    if(hapusAnggota($_GET['id_anggota']) > 0){
        echo"<script>alert('berhasil menghapus blog!');document.location.href='index.php'</script>";
    }else{
        echo"<script>alert('gagal menghapus blog!');document.location.href='index.php'</script>";
    }
}