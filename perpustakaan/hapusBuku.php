<?php

require 'function/function.php';


if(isset($_GET['no_buku'])){
    if(hapusBuku($_GET['no_buku']) > 0){
        echo"<script>alert('berhasil menghapus blog!');document.location.href='index.php'</script>";
    }else{
        echo"<script>alert('gagal menghapus blog!');document.location.href='index.php'</script>";
    }
}