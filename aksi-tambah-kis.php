<?php
session_start();
include "koneksi.php";

$idkis = $_POST['idkis'];
$nik = $_POST['nik'];
$idfaskes = $_POST['idfaskes'];
$query = mysqli_query($conn,"insert into kis values ('$idkis', '$nik', '$idfaskes')");

if (!$query) {
    header("location:kis.php?pesan=gagal");
}else{
    header("location:kis.php?pesan=input");
}

