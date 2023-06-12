<?php
session_start();
include "koneksi.php";

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$ttl = $_POST['ttl'];
$jk = $_POST['jk'];
$query = mysqli_query($conn,"insert into warga values ('$nik', '$nama', '$alamat','$ttl','$jk')");

if (!$query) {
    header("location:warga.php?pesan=gagal");
}else{
    header("location:warga.php?pesan=input");
}

