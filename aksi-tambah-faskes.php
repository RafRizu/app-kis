<?php
session_start();
include "koneksi.php";

$idfaskes = $_POST['idfaskes'];
$namafaskes = $_POST['namafaskes'];
$tingkat = $_POST['tingkat'];
$query = mysqli_query($conn,"insert into faskes values ('$idfaskes', '$namafaskes', '$tingkat')");

if (!$query) {
    header("location:faskes.php?pesan=gagal");
}else{
    header("location:faskes.php?pesan=input");
}

