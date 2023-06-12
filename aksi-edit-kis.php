<?php
session_start();
include "koneksi.php";
$nokartu = $_POST['idkis'];
$nik = $_POST['nik'];
$faskes = $_POST['idfaskes'];
$query = mysqli_query($conn,"update kis set nik = '$nik', idfaskes = '$faskes' where idkis = $nokartu");

if (!$query) {
    header("location:kis.php?pesan=gagal");
}else{
    header("location:kis.php?pesan=edit");
}

